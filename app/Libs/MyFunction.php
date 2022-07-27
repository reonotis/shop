<?php

namespace App\Libs;

class MyFunction
{

    /**
     * 性別の記号を取得する
     * @param int $sexId
     * @return string
     */
    public function viewSexSymbol($sexId):string
    {
        switch ($sexId) {
            case 1:
                $sexSymbol = '♂';
                break;
            case 2:
                $sexSymbol = '♀';
                break;
            case 3:
                $sexSymbol = '⚥';
                break;
            case 4:
                $sexSymbol = '？';
                break;
            default:
                $sexSymbol = '-';
                break;
        }
        return $sexSymbol;
    }

    /**
     * 性別のクラス名を取得する
     * @param int $sexId
     * @return string
     */
    public function viewSexClass($sexId):string
    {
        switch ($sexId) {
            case 1:
                $sexClass = 'sex-men';
                break;
            case 2:
                $sexClass = 'sex-woman';
                break;
            case 3:
                $sexClass = 'sex-other';
                break;
            default:
                $sexClass = '';
                break;
        }
        return $sexClass;
    }




}