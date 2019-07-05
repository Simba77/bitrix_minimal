<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 2019-05-23
 * Time: 21:31
 */

namespace Green\Main;


class Helpers
{


    /**
     * Преобразует текст в массив разбивая его по строкам
     *
     * @param $str
     * @return array
     */
    public static function strToArray($str)
    {

        if (empty($str)) {
            return [];
        }

        $arr = explode("\r", $str);
        $arr = array_map('trim', $arr);

        return $arr;
    }


    /**
     * Форматирование цены
     *
     * @param $price
     * @return string
     */
    public static function formatPrice($price)
    {
        return number_format($price, 0,'.','&nbsp;');
    }


}