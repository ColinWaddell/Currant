<?php


namespace Currant\Helper;

use DateTime;

/**
 * Class StringHelper
 * @package Currant\Helper
 */
class StringHelper
{

    public static function seconds_to_time($seconds) {
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%ad %hh %im');
    }

    public static function pretty_baud($baud) {
        $baud = intval($baud);
        $ret = "unknown";

        if ($baud > 1000000){
            $baud = $baud/1000000;
            $ret = "$baud Mb/s";
        }
        else if ($baud > 1000){
            $baud = $baud/1000;
            $ret = "$baud Kb/s";
        }
        else{
            $ret = "$baud b/s";
        }

        return $ret;
    }

    public static function percentage_load_average($load_average){
        $load_average = substr($load_average, 0, -1);
        $avg_percent = ($load_average) * 100;
        return $avg_percent;
    }

    public static function pretty_load_average($load_average){
        $load_average = substr($load_average, 0, -1);
        $avg_percent = ($load_average) * 100;
        return "{$avg_percent}% Utilized ($load_average)";
    }
}