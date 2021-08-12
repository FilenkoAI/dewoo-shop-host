<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
use \Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
$productId = $request['product_id'];
if ($productId) {
    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $userViews = unserialize($arUser['UF_VIEWS']);
    if( in_array($productId, $userViews) ){
        unset($userViews[$productId]);
        $userViews[$productId] = $productId;
    } else {
        $userViews[$productId] = $productId;
        if ( count($userViews) > 100 ) {
            array_shift($userViews);
        }
    }
    echo json_encode($userViews);
    $userViews = serialize($userViews);

    $user = new CUser;
    $fields = Array(
        "UF_VIEWS"  => $userViews,
    );
    $user->Update($idUser, $fields);
}


?>

