<?php

namespace App\Providers\ShopService;

use App\Models\{Shop, ShopUserBelong, Staff};
use Auth;
use SessionConst;


/**
 * スタッフでログインしている場合に、ショップを選択させたい
 *
 */
class ShopService
{

    /**
     * ショップを選択させるか確認する
     * @param int $loginUserId
     * @return bool
     */
    public function shopCheck(int $loginUserId): bool
    {
        // 選択できる店舗を全て取得
        $selectableShops = ShopUserBelong::getStaffByStaffId($loginUserId);

        if(count($selectableShops) == 0){ // 選択できる店舗がない場合、エラー処理
            throw new Exception('どの店舗も閲覧する権限がありません');
        }


        if(count($selectableShops) == 1){ // 1店舗しかない場合、セッションに格納する
            session([SessionConst::SELECTED_SHOP => $selectableShops[0]]);
            return true;
        }else{ // 複数選択できる場合
            session([SessionConst::SELECTABLE_SHOP => $selectableShops]);
            // いずれかのショップを選択している場合
            if(session()->get(SessionConst::SELECTED_SHOP)){
                return true;
            }
            return false;
        }
    }





}
