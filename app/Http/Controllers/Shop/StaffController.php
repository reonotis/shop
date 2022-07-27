<?php

namespace App\Http\Controllers\shop;

use App\Models\{Shop, ShopUserBelong, Staff};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SessionConst;

class StaffController extends ShopUserAppController
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('shop.staff.index');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function nameSet(Request $request)
    {
        try {
            DB::beginTransaction();

            Staff::where('id', \Auth::user()->id)->update(['name'=>$request->name]);

            DB::commit();
            if(!empty($request->redirectUrl)){
                return redirect($request->redirectUrl)->with('flash-message-success', ['名前を登録しました']);
            }
            return view('shop.dashboard');
        } catch (Exception $e) {
            return redirect()->back()->with('flash-message-errors', ['名前の登録に失敗しました'])->withInput();
        }
    }


}
