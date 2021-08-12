<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION, $USER;

if (empty($arResult)) {
	return "";
}
if($USER->GetId() == '1' && false){

    if(CSite::InDir('/catalog/')){
        if($APPLICATION->GetPageProperty('h1')){
            $strReturn = "<div class='wrapp-breadcrumb'><div class='container'>" . '<h1>' . $APPLICATION->GetPageProperty('h1') . '</h1>' . '<div class="block-breadcrumb">' ;
        } else {
            $strReturn = "<div class='wrapp-breadcrumb'><div class='container'>" .  '<div class="block-breadcrumb">' ;
        }
    } else{
        $strReturn = "<div class='wrapp-breadcrumb'><div class='container'><div class='block-breadcrumb'>";
    }
} else {
    $strReturn = "<div class='wrapp-breadcrumb'><div class='container'>";
}

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if($index >= 2) {
        $title = str_replace("DAEWOO", "", $title);
    }

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');

	if ($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
	    $hiddenClass = ($index != 0 && $index != $itemSize-2) ? "hidden-sm hidden-xs" : "";
		$strReturn .= '
			<div class="breadcrumb-item '.$hiddenClass.'" id="bx_breadcrumb_'.$index.'" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				<a href="'.$arResult[$index]["LINK"].'" itemprop="url"><span itemprop="title">'.$title.'</span></a>
			</div>';
	} else {
	    // временно, пока думаю как
	    if($APPLICATION->getProperty('not_show_breadcrumbs') === 'Y'){
        } else {
            $strReturn .= '<div class="bx-breadcrumb-item"><span>'.$title.'</span></div>';
        }

	}
}
if($USER->GetId() == '1' && false){
    $strReturn .= '</div></div></div>';
} else {

    $strReturn .= '</div></div>';
}
return $strReturn;
