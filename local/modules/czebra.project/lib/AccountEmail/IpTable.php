<?php

namespace Czebra\Project\AccountEmail;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;
use Czebra\Project\ORM\ColorPomadeTable;


class IpTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'cz_email_ip_table';
    }

    public static function getMap()
    {

        return array(
            new Entity\StringField('ORDER_ID', [
                'primary' => true,
            ]),
            new Entity\DatetimeField('DATE_LAST_SENT',
                [
                    'required' => true,
                    'default_value' => new Type\DateTime()
                ]
            ),
            new Entity\IntegerField('MESSAGES_SENT_COUNT', [
                'default_value' => 0
            ])
        );
    }

}