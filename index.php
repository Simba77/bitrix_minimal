<?php
define('IS_HOME_PAGE', 1);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Главная страница");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная страница");
?>


<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>