<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 2019-03-29
 * Time: 12:20
 */


/**
 * Функция для упрощенного обращения с конфигами
 *
 * @param $key
 * @param null $default
 * @return mixed
 */
function config($key = null, $default = null)
{

    if (strpos($key, '.') === false) {
        $config = \Simba\Main\Config::load('app.php');
        return $config->get($key, $default);
    }

    $config_file = substr($key, 0, strpos($key, '.'));
    $dot_keys = substr($key, strpos($key, '.') + 1);

    $config = \Simba\Main\Config::load($config_file.'.php');
    return $config->get($dot_keys, $default);

}