<?php
namespace Czebra\Project\ProductDecorator;

class Characteristics
{
    const SECTION_SORT = 'SECTION';
    const ELEMENT_SORT = 'ELEMENT';
    private $unsortedCharacteristics;
    private $elementId;
    private $sectionId;
 

    public function __construct($unsortedCharacteristics, $elementId, $sectionId)
    {
        $this->unsortedCharacteristics = $unsortedCharacteristics;
        $this->elementId = $elementId;
        $this->sectionId = $sectionId;
    }

    public function sort() : array
    {
        $result = [];
        $order = $this->getElements();
        if(count($order)){
            foreach ($order as $orderItem) {
                foreach ($this->unsortedCharacteristics as $item){
                    if($orderItem === $item['CODE']){
                        $result[] = $item;
                    }
                }
            }
            foreach ($this->unsortedCharacteristics as $item){
                if(!in_array($item['CODE'], $order)){
                    $result[] = $item;
                    continue;
                }
            }
        } else {
            $result = $this->unsortedCharacteristics;
        }

        return $result;

    }
    private function getElements()
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $forElement = \Bitrix\Iblock\Elements\ElementCharacteristicsorderTable::query()
            ->setSelect(['NAME', 'ORDER.VALUE'])
            ->setFilter([ 'ELEMENT.VALUE' => $this->elementId ])
            ->fetchObject();

        $forSection = \Bitrix\Iblock\Elements\ElementCharacteristicsorderTable::query()
            ->setSelect(['NAME',   'ORDER.VALUE'])
            ->setFilter([ 'SECTION.VALUE' => $this->sectionId ])
            ->fetchObject();

        $result = [];

        if (is_null($forElement) && is_null($forSection))
        {
            return $result;
        }
        elseif (!is_null($forElement))
        {
            $result = [];
            foreach ($forElement->getOrder()->getAll() as $item){
                $result[] = $item->getValue();
            }
            return $result;
        }
        else
        {
            foreach ($forSection->getOrder()->getAll() as $item){
                $result[] = $item->getValue();
            }
            return $result;
        }

    }
}

