<?php

namespace App\Http\Controllers\shop;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\{Shop, ShopUserBelong, Staff};
use App\Consts\DatabaseConst;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Mail;


class ShopController extends Controller
{

    # コンストラクタ
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->loginUser = \Auth::user();
            $shopService = app()->make('ShopService');
            if(!$shopService->shopCheck($this->loginUser->id)){
                Redirect::route('shop.shopSelect')->send();
            }
            return $next($request);
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('shop.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $shops = Shop::paginate(30);
        return view('shop.shop.list', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('shop.shop.create');
    }

    /**
     * 登録するショップの確認画面を表示します
     * @param  StoreShopRequest  $request
     * @return View|RedirectResponse
     */
    public function storeConfirm(StoreShopRequest $request)
    {
        try {
            $this->errMsg = [];
            $shopResult = $this->validateShop($request);
            $staffResult = $this->validateStaff($request);

            if(!$shopResult || !$staffResult){
                throw new Exception();
            }
            return view('shop.shop.storeConfirm', compact('request'));
        } catch (Exception $e) {
            return redirect()->back()->with('flash-message-errors', $this->errMsg)->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        //
        try {
            $this->errMsg = [];
            $shopResult = $this->validateShop($request);
            $staffResult = $this->validateStaff($request);

            if(!$shopResult || !$staffResult){
                throw new Exception();
            }

            DB::beginTransaction();

            // ショップの登録
            $shopInsertData = [
                'shop_name' => $request->shop_name,
                'email' => $request->shop_mail_address,
            ];
            $shop = Shop::insertShop($shopInsertData);
            if(!$shop){
                throw new Exception();
            }

            // スタッフの登録
            $staffInsertData = [
                'shop_id' => $shop->id,
                'email' => $request->staff_mail_address
            ];
            list($result, $staffDate) = $this->insertStaff($staffInsertData);
            if(!$result){
                throw new Exception();
            }


            $staffDate->shopName = $request->shop_name;
            // メールの送信
            $this->sendOpeningMail($staffDate);

            DB::commit();
            return redirect()->route('shop.shop.show', ['shop' => $shop->id])->with('flash-message-success', ['登録しました'])->withInput();
        } catch (Exception $e) {
            dd($e->getMessage(), 'store');
            return redirect()->back()->with('flash-message-errors', $this->errMsg)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
        $shopStaffs = ShopUserBelong::getStaffByShopId($shop->id);
        return view('shop.shop.show', compact('shop', 'shopStaffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
        $shopStaffs = ShopUserBelong::getStaffByShopId($shop->id);
        return view('shop.shop.edit', compact('shop', 'shopStaffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopRequest  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
        dd(11111);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        dd(11111);
        //
    }

    /**
     * ショップに担当者を追加する画面を表示する
     * @param Shop $shop
     * @return void
     */
    public function staffCreate(Shop $shop)
    {
        return view('shop.shop.staffCreate', compact('shop'));
    }

    /**
     * ショップにスタッフを登録する確認画面を表示します
     * @param  StoreShopRequest  $request
     * @return View|RedirectResponse
     */
    public function staffStoreConfirm(StoreShopRequest $request)
    {
        try {
            $this->errMsg = [];
            $staffResult = $this->validateStaff($request);

            if(!$staffResult){
                throw new Exception();
            }
            return view('shop.shop.staffStoreConfirm', compact('request'));
        } catch (Exception $e) {
            return redirect()->back()->with('flash-message-errors', $this->errMsg)->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function staffStore(StoreShopRequest $request)
    {
        //
        try {
            $this->errMsg = [];
            $staffResult = $this->validateStaff($request);

            if(!$staffResult){
                throw new Exception();
            }

            DB::beginTransaction();

            // スタッフの登録
            $staffInsertData = [
                'shop_id' => $request->shop_id,
                'email' => $request->staff_mail_address
            ];
            list($result, $staffDate) = $this->insertStaff($staffInsertData);
            if(!$result){
                throw new Exception();
            }


            // メールの送信
            $this->sendOpeningMail($staffDate);

            DB::commit();
            return redirect()->route('shop.shop.show', ['shop' => $request->shop_id])->with('flash-message-success', ['登録しました'])->withInput();
        } catch (Exception $e) {
            dd($e->getMessage(), 'store');
            return redirect()->back()->with('flash-message-errors', $this->errMsg)->withInput();
        }
    }

    /**
     *
     * @param Request $request
     * @return bool
     */
    private function validateShop(Request $request): bool
    {
        if(empty($request->shop_name)){
            $this->errMsg[] = 'ショップ名を入力してください';
        }
        if(empty($request->shop_mail_address)){
            $this->errMsg[] = 'ショップ用のメールアドレスを入力してください';
        }
        if(Shop::getShopByEmail($request->shop_mail_address)){
            $this->errMsg[] = '入力したショップ用のメールアドレスは既に利用されています';
        }

        if(!empty($this->errMsg)){
            return false;
        }

        return true;
    }

    /**
     *
     * @param Request $request
     * @return bool
     */
    private function validateStaff(Request $request): bool
    {
        if(empty($request->staff_mail_address)){
            $this->errMsg[] = '担当者のメールアドレスを入力してください';
        }
        if(!empty($request->shop_id)){
            $shopStaffs = ShopUserBelong::getStaffByShopId($request->shop_id);

            foreach($shopStaffs as $staff){
                if($request->staff_mail_address == $staff->email){
                    $this->errMsg[] = 'このメールアドレスは、このショップのスタッフとして既に登録されています';
                }
            }
        }

        if(!empty($this->errMsg)){
            return false;
        }

        return true;
    }

    /**
     * Undocumented function
     *
     * @param array $staffInsertData
     * @return void
     */
    private function insertStaff(array $staffInsertData)
    {
        // 対象のメールアドレスが、 既に staff テーブルに登録されているか確認する
        $staff = Staff::getStaffByEmail($staffInsertData['email']);

        // まだスタッフが登録されてい場合
        if(!$staff){
            $password = uniqid($staffInsertData['shop_id'] . 'pass');
            $staffInsertData['password'] = Hash::make($password);
            // 新しくスタッフを登録
            $staff = Staff::insertStaff($staffInsertData);
            if(!$staff){
                return [false, false];
            }
            $staff->password = $password;
        }else{
            // メール送信パターンを選択しておく
            $staff->mailPattern = true;
        }

        // スタッフを shop に紐づける
        $insertResult = ShopUserBelong::insert([
            'shop_id' => $staffInsertData['shop_id'],
            'staff_id' => $staff->id
        ]);
        if(!$insertResult){
            return [false, false];
        }

        return [true, $staff];

    }

    private function sendOpeningMail($staffDate)
    {
        try{
            if($staffDate->mailPattern){
                dd($staffDate);
            }else{
                // 新しく名前などを設定してもらうメールを送信する
                $data = [
                    'siteName' => config('app.name'),
                    'shopName' => $staffDate->shopName,
                    'url' => URL::signedRoute('shop.myPage'),
                ];
                Mail::send('emails.shop.accountOpen', $data, function($message){
                    $message->to('fujisawareon@yahoo.co.jp', 'Test')
                    ->subject('This is a test mail');
                });

            }
        } catch (Exception $e) {
            $this->errMsg[] = 'メールの送信に失敗しました';
            return false;
        }
        dd($staffDate, 'accountOpen');
        return true;
    }


}
