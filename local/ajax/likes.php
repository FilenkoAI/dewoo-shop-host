<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
use \Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
?>
<?
const IBLOCK_ID = 20;
CModule::IncludeModule('iblock');
global $USER;
if ($request['reviewId'] && $request['type'] && $request['session']) {
    $elementId = $request['reviewId'];
    $type = $request['type'];
    $userId = $USER->GetId();

    $arFilter = array(
        "IBLOCK_ID" => IBLOCK_ID,
        "ID" => $elementId,
    );
    $arSelect = array(
        "PROPERTY_LIKES",
        "PROPERTY_DISLIKES",
        "PROPERTY_USERS_LIKED"
    );
    $res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, $arSelect);
    if ($ar_fields = $res->GetNext()) {
        $data = array(
            "LIKES" => $ar_fields["PROPERTY_LIKES_VALUE"],
            "DISLIKES" => $ar_fields["PROPERTY_DISLIKES_VALUE"],
            "USERS_LIKED" => unserialize($ar_fields["~PROPERTY_USERS_LIKED_VALUE"])
        );
        if (!array_key_exists($userId, $data['USERS_LIKED'])) {
            if ($type == 'like') {
                $data["USERS_LIKED"][] = serialize(array($userId => 'like'));
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'],
                    'LIKES' => $data['LIKES'] + 1
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' => '.yes-reviews span',
                         'value' => $valuesToSet['LIKES']
                    ]
                ]);
            } elseif ($type == 'dislike') {
                $data["USERS_LIKED"][] = serialize(array($userId => 'dislike'));
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'] + 1,
                    'LIKES' => $data['LIKES']
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' => '.no-reviews span',
                        'value' => $valuesToSet['DISLIKES']
                    ]
                ]);
            }
        } else {
            if ($data["USERS_LIKED"][$userId] == 'like' && $type == 'like') {
                unset($data["USERS_LIKED"][$userId]);
                $data["USERS_LIKED"] = serialize($data["USERS_LIKED"]);
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'],
                    'LIKES' => $data['LIKES'] - 1
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' => '.yes-reviews span',
                        'value' => $valuesToSet['LIKES']
                    ]
                ]);
            } elseif ($data["USERS_LIKED"][$userId] == 'like' && $type == 'dislike') {
                unset($data["USERS_LIKED"][$userId]);
                $data["USERS_LIKED"][] = serialize(array($userId => 'dislike'));
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'] + 1,
                    'LIKES' => $data['LIKES'] - 1
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' => '.yes-reviews span',
                        'value' => $valuesToSet['LIKES']
                    ],
                    'CHANGE_SECOND' => [
                        'selector' =>'.no-reviews span',
                        'value' => $valuesToSet['DISLIKES']
                    ]
                ]);
            } elseif ($data["USERS_LIKED"][$userId] == 'dislike' && $type == 'dislike') {
                unset($data["USERS_LIKED"][$userId]);
                $data["USERS_LIKED"] = serialize($data["USERS_LIKED"]);
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'] - 1,
                    'LIKES' => $data['LIKES']
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' =>'.no-reviews span',
                        'value' => $valuesToSet['DISLIKES']
                    ]
                ]);
            } elseif ($data["USERS_LIKED"][$userId] == 'dislike' && $type == 'like') {
                unset($data["USERS_LIKED"][$userId]);
                $data["USERS_LIKED"][] = serialize([$userId => 'like']);
                $valuesToSet = array(
                    'USERS_LIKED' => $data["USERS_LIKED"],
                    'DISLIKES' => $data['DISLIKES'] - 1,
                    'LIKES' => $data['LIKES'] + 1
                );
                CIBlockElement::SetPropertyValuesEx(
                    $elementId,
                    IBLOCK_ID,
                    $valuesToSet,
                    array()
                );
                echo json_encode([
                    'IS_ERROR' => 'N',
                    'CHANGE_FIRST' => [
                        'selector' => '.yes-reviews span',
                        'value' => $valuesToSet['LIKES']
                    ],
                    'CHANGE_SECOND' => [
                        'selector' =>'.no-reviews span',
                        'value' => $valuesToSet['DISLIKES']
                    ]
                ]);;
            }
        }

    } else {
        echo 0;
    }
} else {
    echo -1;
}
?>