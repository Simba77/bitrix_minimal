<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404. Страница не существует");
?>
    <div class="container">
        <p class="light-text">
            Вы перешли по несуществующему или ошибочному адресу. Рекомендуем воспользоваться поиском или меню сайта
        </p>
    </div>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>