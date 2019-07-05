<?php defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 2019-04-03
 * Time: 17:13
 */


if (!function_exists('array_key_first')) {

    /**
     * @param array $array
     * @return |null
     */
    function array_key_first(array $array)
    {
        return $array ? array_keys($array)[0] : null;
    }
}


if (!function_exists('p')) {

    /**
     * Обёртка над функцией print_r
     *
     * @param mixed $mVar
     * @param bool $in_file
     */
    function p($mVar = false, $in_file = false)
    {
        if ($in_file) {
            $file = fopen($_SERVER['DOCUMENT_ROOT'].'/p.log', "a");
            if (!$file) {
                print "";
            } else {
                fputs($file, print_r($mVar, true));
                fputs($file, '
        ');
                fclose($file);
            }
        }
        if (!$in_file || $in_file == 2) {
            ?>
            <pre><? print_r($mVar); ?></pre><?
        }
    }
}