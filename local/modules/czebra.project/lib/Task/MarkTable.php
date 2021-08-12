<?php
namespace Czebra\Project\Task;

use Bitrix\Main\Entity;

class MarkTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'mark_table';
    }
    public static function getObjectClass()
    {
        return Mark::class;
    }
    public static function getCollectionClass()
    {
        return Marks::class;
    }

    public static function onBeforeUpdate(\Bitrix\Main\Entity\Event $event)
    {
        $result = new \Bitrix\Main\Entity\EventResult();

        $result->modifyFields(
            [
                'UPDATE_DATE' => new Type\DateTime()
            ]
        );

        return $result;
    }

    public static function onBeforeAdd(Entity\Event $event)
    {
        $result = new Entity\EventResult;

        if ( !isset($data['ADDED_DATE']) || !isset($data['UPDATE_DATE']) )
        {
            $result->modifyFields([
                'ADDED_DATE' => new Type\DateTime(),
                'UPDATE_DATE' => new Type\DateTime()
            ]);
        }

        return $result;
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),

            new Entity\StringField('NAME_RU'),
            new Entity\StringField('NAME'),
            new Entity\DateField('ADDED_DATE'),
            new Entity\DatetimeField('UPDATE_DATE')
        ];
    }
}

