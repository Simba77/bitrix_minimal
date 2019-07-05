<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 2019-03-29
 * Time: 12:18
 */

namespace Simba\Main;

use Adbar\Dot;

class Config extends Dot
{
    private static $configs = [];

    /**
     * Метод загружает конфигурационный файл
     *
     * @param $file_name
     * @return Dot
     */
    public static function load($file_name)
    {

        if (array_key_exists($file_name, self::$configs) && !empty(self::$configs[$file_name])) {
            return new parent(self::$configs[$file_name]);
        }

        $file_path = $_SERVER['DOCUMENT_ROOT'].'/local/config/'.$file_name;

        if (is_file($file_path)) {
            self::$configs[$file_name] = require $file_path;
            return new parent(self::$configs[$file_name]);
        }

        return new parent([]);
    }


}