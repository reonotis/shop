<?php

namespace App\Common;

use App\Consts\Common;

class CommonSchedule
{

  /**
   * 対象日の曜日始まりの日付を取得する
   * 例) 日曜始まりの場合、水曜日の日付を渡されたら、その前の日曜日を取得する
   *
   * @param string $firstDay
   * @return string
   */
  public static function getStartWeekDay($date)
  {
    $firstDay = strtotime($date);
    $startWeek = array_key_first(Common::WEEK_LIST);

    if ($startWeek <> date('w', $firstDay) ){

      while(date('w', $firstDay) <> $startWeek){
        $firstDay = strtotime('-1 day', $firstDay);
      }
    }
    return date('Y-m-d', $firstDay);
  }

  /**
   * 対象日の曜日終わりの日付を取得する
   * 例) 日曜始まりの場合、水曜日の日付を渡されたら、その次の土曜日を取得する
   *
   * @param string $firstDay
   * @return string
   */
  public static function getLastWeekDay($date)
  {
    $endDay = strtotime($date);
    $endWeek = array_key_last(Common::WEEK_LIST);

    if ($endWeek <> date('w', $endDay) ){

      while(date('w', $endDay) <> $endWeek){
        $endDay = strtotime('+1 day', $endDay);
      }
    }
    return date('Y-m-d', $endDay);
  }

}