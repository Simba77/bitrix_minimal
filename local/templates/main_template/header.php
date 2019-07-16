<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Page\Asset;
$assets = Asset::getInstance();

// Подключение css и js файлов
$assets->addCss(SITE_TEMPLATE_PATH.'/assets/css/style.css');
$assets->addJs(SITE_TEMPLATE_PATH.'/assets/js/script.js');

?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,500">
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>

