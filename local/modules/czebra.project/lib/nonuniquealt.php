<?php
namespace Czebra\Project;
class NonUniqueAlt
{
    private $count;
    private $name;
    private $increment;
    public function __construct($name, $count, $increment)
    {
        $this->name = $name;
        $this->count = $count;
        $this->increment = $increment;
    }

    public function getNextName()
    {
        $src = $this->name . '_' . $this->count;
        $this->count += $this->increment;
        return $src;
    }

}