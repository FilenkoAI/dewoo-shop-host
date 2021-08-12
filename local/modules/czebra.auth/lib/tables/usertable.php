<?php
namespace Czebra\Auth\Tables;

use \Bitrix\Main\Entity;
use \Bitrix\Main\Type;
use \Bitrix\Main\ORM\Fields\Relations\Reference;
use \Bitrix\Main\ORM\Query\Join;


//class PomadeTable extends Entity\DataManager

class UserTable extends \Bitrix\Main\ORM\Data\DataManager
{
    public static function getTableName()
    {
        return 'b_user';
    }
    public static function getObjectClass()
    {
        return User::class;
    }
    public static function getCollectionClass()
    {
        return Users::class;
    }
    public static function getMap()
    {

        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('LOGIN', array(
                'required' => true
            )),
            new Entity\DateTimeField('DATE_REGISTER'),
            new Entity\StringField('ACTIVE'),
            new Entity\StringField('EMAIL')

        );
    }


}

/*class Pomade extends EO_Pomade
{

}
*/
//print_r(Czebra\Project\ORM\PomadeTable::getEntity()->compileDbTableStructureDump()); 
/*
DROP TABLE if exists cz_pomade;

//не пашет ENUM
CREATE TABLE `cz_pomade` (
    `ID` int NOT NULL AUTO_INCREMENT, 
    `NAME` varchar(255) NOT NULL, 
    `COLOR` varchar(255) NOT NULL, 
    `FIRM` ENUM('Red') NOT NULL, 
    `IS_OUT_PRODUCTION` varchar(1) NOT NULL, 
    `DATE_ADDED` date NOT NULL, 
    `DATE_UPDATE` date NOT NULL, 
    PRIMARY KEY(`ID`)
);

//без ид цвета
CREATE TABLE `cz_pomade` (
    `ID` int NOT NULL AUTO_INCREMENT, 
    `NAME` varchar(255) NOT NULL, 
    `COLOR` varchar(255) NOT NULL, 
    `FIRM` varchar(10) NOT NULL, 
    `IS_OUT_PRODUCTION` varchar(1) NOT NULL, 
    `DATE_ADDED` date NOT NULL, 
    `DATE_UPDATE` date NOT NULL, 
    PRIMARY KEY(`ID`)
);

CREATE TABLE `cz_pomade` (
    `ID` int NOT NULL AUTO_INCREMENT, 
    `NAME` varchar(255) NOT NULL, 
    `FIRM` varchar(10) NOT NULL, 
    `COLOR_ID` int NOT NULL, 
    `IS_OUT_PRODUCTION` varchar(1) NOT NULL, 
    `DATE_ADDED` date NOT NULL, 
    `DATE_UPDATE` date NOT NULL, 
    PRIMARY KEY(`ID`),
    FOREIGN KEY (COLOR_ID)  REFERENCES cz_color_pomade (ID)
);
//#ea9c8d
INSERT INTO cz_pomade (NAME, COLOR_ID, FIRM, IS_OUT_PRODUCTION, DATE_ADDED) 
    VALUES ('Colour Elixir Lipstick', 1, 'Max Factor', false, '2015-12-17');

//#f82c37
INSERT INTO cz_pomade (NAME, COLOR_ID, FIRM, IS_OUT_PRODUCTION, DATE_ADDED) 
    VALUES ('Lipfinity Lipstick', 2, 'Max Factor', false, '2016-02-14');

//#a3709c
INSERT INTO cz_pomade (NAME, COLOR_ID, FIRM, IS_OUT_PRODUCTION, DATE_ADDED, DATE_UPDATE) 
    VALUES ('Super Stay Matte Ink', '3', 'Maybelline', true, '2014-10-21', '2020-10-01');

//#e0485e
INSERT INTO cz_pomade (NAME, COLOR, FIRM, IS_OUT_PRODUCTION, DATE_ADDED) 
    VALUES ('Diorific Lipstick Golden Nights', 'Pink', 'Dior', true, '2017-09-28');

INSERT INTO cz_pomade (NAME, COLOR, FIRM, IS_OUT_PRODUCTION, DATE_ADDED) 
    VALUES ('Colour Elixir', 'Red', 'Max Factor', false, '2019-03-04');

INSERT INTO cz_pomade (NAME, COLOR, FIRM, IS_OUT_PRODUCTION, DATE_ADDED, DATE_UPDATE) 
    VALUES ('Colour Elixir Lipstick', 'Nude', 'Max Factor', true, '2015-12-17', '2019-01-25');

INSERT INTO cz_pomade (NAME, COLOR, FIRM, IS_OUT_PRODUCTION) 
    VALUES ('Colour Elixir Velvet Mattes Lipstick', 'Lilac', 'Max Factor', false);


//выбор всех помад одной марки способом getList
$result = Czebra\Project\ORM\PomadeTable::getList(array(
    'select' => array('*'),
    'filter' => array('=FIRM' => 'Max Factor')
))->fetchAll();
print_r($result);

//выбор всех помад одной марки способом query
$q = new \Bitrix\Main\Entity\Query(Czebra\Project\ORM\PomadeTable::getEntity());
$q->setSelect(array('NAME', 'FIRM'));
$q->setFilter(array('=FIRM' => 'Max Factor'));
$result = $q->exec()->fetchAll();
print_r($result);
*/

// $pomada = Czebra\Project\ORM\PomadeTable::query()
//     ->setFilter(['=FIRM' => 'Max Factor'])
//     ->setSelect(['ID', 'NAME', 'FIRM'])
//     ->fetchCollection();

/*
//добавления новой помады
//$newPomade = Czebra\Project\ORM\PomadeTable::createObject();
$newPomade = new Czebra\Project\ORM\Pomade();
//$newPomade->set('NAME', 'Super Stay Matte Ink');
$newPomade->setName('Super Stay Matte Ink');
$newPomade->set('COLOR_ID', 3);
$newPomade->set('FIRM', 'Maybelline');
$newPomade->set('IS_OUT_PRODUCTION', false);
$newPomade->save();

//получение цвета определенной помады
$pomade = Czebra\Project\ORM\PomadeTable::getByPrimary(1, [
    'select' => ['*', 'COLOR']
])->fetchObject();
echo $pomade->getColor()->getName();

//удаление помад определенного цвета

// $colorPomade = Czebra\Project\ORM\ColorPomadeTable::getList(array(
//     'select' => array('*'),
//     'filter' => array('=NAME' => 'Lilac')
// ))->fetchCollection();

// $idColorPomade = $colorPomade->getIdList();
// print_r($idColorPomade);

$colorPomade = Czebra\Project\ORM\ColorPomadeTable::getList(array(
    'select' => array('*'),
    'filter' => array('=NAME' => 'Lilac')
))->fetchCollection();

$idColorPomade = $colorPomade->getIdList();
print_r($idColorPomade);

$pomades = Czebra\Project\ORM\PomadeTable::getList(
   array(
    'select' => array('ID', 'NAME'),
    'filter' => array('=COLOR_ID' => $idColorPomade)
))->fetchCollection();
foreach ($pomades as $pomade)
{
    $pomade->delete();
}

*/

// $pomades = Czebra\Project\ORM\PomadeTable::getList(array(
//     'select' => array('*'),
//     'filter' => array('COLOR.NAME' => 'Lilac')
// ))->fetchCollection();

// foreach($pomades as $item) {
//     $item->delete();
// $item->snjataSproizvod();
// }
// $pomades->save();
