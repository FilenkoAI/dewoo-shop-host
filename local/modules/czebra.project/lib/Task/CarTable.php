<?php
namespace Czebra\Project\Task;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

class CarTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'car_table';
    }
    public static function getObjectClass()
    {
        return Car::class;
    }

    public static function getCollectionClass()
    {
        return Cars::class;
    }

    public static function onBeforeAdd(Entity\Event $event)
    {
        $result = new Entity\EventResult;

        if ( !isset($data['ADDED_DATE']) )
        {
            $result->modifyFields([
                'ADDED_DATE' => new Type\DateTime(),
            ]);
        }

        return $result;
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('MODEL'),
            new Entity\IntegerField('MARK_ID'),
            (new Reference(
                'MARK',
                Mark::class,
                Join::on('this.MARK_ID', 'ref.ID')
            ))->configureJoinType('inner'),
            new Entity\StringField('LEASE'),
            new Entity\DateField('ADDED_DATE')
        );
    }
}

