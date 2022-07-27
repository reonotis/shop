<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ShopUserAppController extends Controller
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->loginUser = \Auth::user();

            // 名前など必要な情報がない場合は、基本情報入力画面に遷移する
            if(empty($this->loginUser->name)){
                $this->goToSettingName();
            }

            // 操作できるショップがあるかチェックする
            $shopService = app()->make('ShopService');
            if(!$shopService->shopCheck($this->loginUser->id)){
                Redirect::route('shop.shopSelect')->send();
            }
            return $next($request);
        });
    }


    public function goToSettingName()
    {
        $query = [
            "redirectUrl" => url()->current(),
        ];
        Redirect::route('shop.setting.name', $query)->send();
    }


}
