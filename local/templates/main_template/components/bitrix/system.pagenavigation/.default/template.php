<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$ClientID = 'navigation_'.$arResult['NavNum'];

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) {
        return;
    }
}
?>
<ul class="pagination">
    <?php
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

    // to show always first and last pages
    $arResult["nStartPage"] = 1;
    $arResult["nEndPage"] = $arResult["NavPageCount"];

    $sPrevHref = '';
    if ($arResult["NavPageNomer"] > 1) {
        $bPrevDisabled = false;

        if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2) {
            $sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"] - 1);
        } else {
            $sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
        }
    } else {
        $bPrevDisabled = true;
    }

    $sNextHref = '';
    if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {
        $bNextDisabled = false;
        $sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"] + 1);
    } else {
        $bNextDisabled = true;
    }
    ?>
    <?php if ($bPrevDisabled): ?>
        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">
                <span class="fa fa-angle-double-left"></span>
            </a></li><?php else: ?>
        <li class="page-item">
        <a class="page-link" href="<?= $sPrevHref; ?>" id="<?= $ClientID ?>_previous_page" tabindex="-1">
            <span class="fa fa-angle-double-left"></span>
        </a>
        </li><?php endif; ?>

    <?php
    $bFirst = true;
    $bPoints = false;
    do {
        if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"] - $arResult["nStartPage"] <= 1 || abs($arResult['nStartPage'] - $arResult["NavPageNomer"]) <= 2) {

            if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                ?>
                <li class="page-item active"><a class="page-link"><?= $arResult["nStartPage"] ?></a></li>
            <?php
            elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                ?>
                <li class="page-item"><a class="page-link"
                                         href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                </li>
            <?php
            else:
                ?>
                <li class="page-item"><a class="page-link"
                                         href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                </li>
            <?php
            endif;
            $bFirst = false;
            $bPoints = true;
        } else {
            if ($bPoints) {
                ?>
                <li class="page-item"><a class="page-link">...</a></li><?
                $bPoints = false;
            }
        }
        $arResult["nStartPage"]++;
    } while ($arResult["nStartPage"] <= $arResult["nEndPage"]);
    ?>
    <?php if ($bNextDisabled): ?>
        <li class="page-item disabled">
            <a class="page-link"><span class="fa fa-angle-double-right"></span></a>
        </li><?php else: ?>
        <li class="page-item">
            <a class="page-link" href="<?= $sNextHref; ?>" id="<?= $ClientID ?>_next_page"><span
                        class="fa fa-angle-double-right"></span></a>
        </li>
    <?php endif; ?>
</ul>

<?php CJSCore::Init(); ?>
<script type="text/javascript">
    BX.bind(document, "keydown", function (event) {

        event = event || window.event;
        if (!event.ctrlKey)
            return;

        var target = event.target || event.srcElement;
        if (target && target.nodeName && (target.nodeName.toUpperCase() == "INPUT" || target.nodeName.toUpperCase() == "TEXTAREA"))
            return;

        var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
        if (!key)
            return;

        var link = null;
        if (key == 39)
            link = BX('<?=$ClientID?>_next_page');
        else if (key == 37)
            link = BX('<?=$ClientID?>_previous_page');

        if (link && link.href)
            document.location = link.href;
    });
</script>