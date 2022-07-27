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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use SessionConst;


class ShopSelectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shops = ShopUserBelong::getStaffByStaffId(\Auth::user()->id);
        return view('shop.shop.select', compact('shops'));
    }

    /**
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function selecting(Shop $shop)
    {
        try {
            // 対象のショップに紐づいているかチェック
            $result = ShopUserBelong::checkSelectableShop($shop->id, \Auth::user()->id);
            if(!$result){
                throw new Exception('不正なアクセスです');
            }
            session()->put(SessionConst::SELECTED_SHOP, $shop);

            return redirect()->route('shop.product.index')->with('flash-message-success', ['選択しました'])->withInput();

        } catch (Exception $e) {
            return redirect()->back()->with('flash-message-errors', [$e->getMessage()]);
        }
    }

    /**
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function deselect()
    {
        session()->forget(SessionConst::SELECTED_SHOP);
        return redirect()->route('shop.product.index');
    }

}
