<?php

namespace App\Consts;

class Common
{
  // 性別
  public const SEX_MEN = 1;
  public const SEX_WOMAN = 2;
  public const SEX_OTHER = 3;
  public const SEX_LIST = [
    self::SEX_MEN => '男性',
    self::SEX_WOMAN => '女性',
    self::SEX_OTHER => 'その他',
  ];
  public const SEX_SYMBOL = [
    self::SEX_MEN => '♂',
    self::SEX_WOMAN => '♀',
    self::SEX_OTHER => '-',
  ];

  // 曜日
  public const WEEK_LIST = [  // カレンダーの並び順
    0 => '日',
    1 => '月',
    2 => '火',
    3 => '水',
    4 => '木',
    5 => '金',
    6 => '土',
  ];

  // エントリー
  public const ENTRY_BOAT = 1;
  public const ENTRY_BEACH = 2;
  public const ENTRY_LIST = [
    self::ENTRY_BOAT => 'boat',
    self::ENTRY_BEACH => 'beach',
  ];

  // 天気
  public const WETHER_SUNNY = 1;
  public const WETHER_CLOUDY = 2;
  public const WETHER_RAIN = 3;
  public const WETHER_SUNNY_CLOUDY = 4;
  public const WETHER_CLOUD_RAIN = 5;
  public const WETHER_MOON = 6;
  public const WETHER_MOON_CLOUD = 7;
  public const WETHER_LIST = [
    self::WETHER_SUNNY => 'sunny',
    self::WETHER_CLOUDY => 'cloudy',
    self::WETHER_RAIN => 'rain',
    self::WETHER_SUNNY_CLOUDY => 'sunny-cloudy',
    self::WETHER_CLOUD_RAIN => 'cloud-rain',
    self::WETHER_MOON => 'moon',
    self::WETHER_MOON_CLOUD => 'moon-cloud',
  ];

  // 波
  public const WAVE_NONE = 1;
  public const WAVE_SOMEWHAT = 2;
  public const WAVE_HARD = 3;
  public const WAVE_LIST = [
    self::WAVE_NONE => 'none',
    self::WAVE_SOMEWHAT => 'somewhat',
    self::WAVE_HARD => 'hard',
  ];

  // 流れ
  public const FLOW_NONE = 1;
  public const FLOW_SOMEWHAT = 2;
  public const FLOW_STRONG = 3;
  public const FLOW_LIST = [
    self::FLOW_NONE => 'flow_none',
    self::FLOW_SOMEWHAT => 'flow_somewhat',
    self::FLOW_STRONG => 'flow_strong',
  ];

  // 風
  public const WIND_NONE = 1;
  public const WIND_SOMEWHAT = 2;
  public const WIND_STRONG = 3;
  public const WIND_LIST = [
    self::WIND_NONE => 'wind_none',
    self::WIND_SOMEWHAT => 'wind_somewhat',
    self::WIND_STRONG => 'wind_strong',
  ];





}