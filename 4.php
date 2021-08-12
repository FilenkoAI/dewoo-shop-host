<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?>
<pre>
<?
//$urlImg = 'https://img.youtube.com/vi/tahk2fAxb5U/hqdefault.jpg';
//
//$el = new CIBlockElement;
//
//$arLoadProductArray = Array(
//    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
//    "DETAIL_PICTURE" => CFile::MakeFileArray($urlImg)
//);
//
//$PRODUCT_ID = 4723;  // изменяем элемент с кодом (ID) 2
//$res = $el->Update($PRODUCT_ID, $arLoadProductArray);
//print_r($res);
?>
<?
$arSelect = Array("ID", "NAME", "PROPERTY_LINK", "DETAIL_PICTURE");
$arFilter = Array("IBLOCK_ID"=>IntVal(14), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => [4724, 4722, 4721]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>510), $arSelect);
global $USER;
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    print_r($arFields);
        $link = $arFields['PROPERTY_LINK_VALUE'];
        $code = '';
        if (!strpos($link,'?v=')){
            $temArr = explode('/', $link);
        } else {
            $temArr = explode('?v=', $link);
        }
        $code = end($temArr);
        $url = 'https://img.youtube.com/vi/' . $code . '/hqdefault.jpg';
        print_r($url);
        echo '<br>';
        $el = new CIBlockElement;

        $arLoadProductArray = Array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "DETAIL_PICTURE" => CFile::MakeFileArray($url)
        );
        $PRODUCT_ID = $arFields['ID'];  // изменяем элемент с кодом (ID) 2
        $result = $el->Update($PRODUCT_ID, $arLoadProductArray);
        print_r($result);
}
?>
</pre>

<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>
