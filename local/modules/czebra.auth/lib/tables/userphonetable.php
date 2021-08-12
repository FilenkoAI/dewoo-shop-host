<?php
namespace Czebra\Auth\Tables;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;
use \Bitrix\Main\ORM\Fields\Relations\Reference;
use \Bitrix\Main\ORM\Query\Join;

class UserPhoneTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'b_user_phone_auth';
    }
    public static function getObjectClass()
    {
        return UserPhone::class;
    }
    public static function getCollectionClass()
    {
        return UserPhones::class;
    }
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('USER_ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            (new Reference(
                'USER',
                UserTable::class,
                Join::on('this.USER_ID', 'ref.ID')
            ))->configureJoinType('inner'),

            new Entity\StringField('PHONE_NUMBER'),

        );
    }
} 

