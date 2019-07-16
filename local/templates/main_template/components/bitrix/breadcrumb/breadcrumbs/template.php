<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;


//delayed function must return a string
if (empty($arResult)) {
    return "";
}

$strReturn = '';

$arResult = array_merge([['TITLE' => 'Главная', 'LINK' => '/']], $arResult);

$strReturn .= '<nav aria-label="breadcrumb" role="navigation"><ol class="breadcrumb bg-transparent pl-0 mb-0">';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    $nextRef = ($index < $itemSize - 2 && $arResult[$index + 1]["LINK"] <> "" ? ' itemref="bx_breadcrumb_'.($index + 1).'"' : '');
    $child = ($index > 0 ? ' itemprop="child"' : '');

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '
			<li class="breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">
					<span itemprop="title">'.$title.'</span>
				</a>
			</li>';
    } else {
        $strReturn .= '
			<li class="breadcrumb-item active">
				<span>'.$title.'</span>
			</li>';
    }
}

$strReturn .= '</ol></nav>';

return $strReturn;
