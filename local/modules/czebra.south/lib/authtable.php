<?php
namespace Czebra\South;

//use Bitrix\Main\UserTable;
use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;
use Czebra\Project\ORM\ColorPomadeTable;

//use \Bitrix\Main\ORM\Fields\Relations\Reference;
//use \Bitrix\Main\ORM\Query\Join;

class AuthTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'cz_south';
    }
    public static function getMap()
    {

        return array(
            new Entity\StringField('PHONE', [
                'primary' => true,
            ]),
            new Entity\StringField('CODE_HASH', [
                'required' => true
            ]),
            new Entity\IntegerField('MESSAGES_SENT_COUNT',[
                'default_value' => 0
            ]),
            new Entity\IntegerField('ATTEMPTS_COUNT',[
                'default_value' => 0
            ]),
            new Entity\DatetimeField('DATE_SENT',
                [
                    'required' => true,
                    'default_value' => new Type\DateTime()
                ]
            ),
        );
    }

}