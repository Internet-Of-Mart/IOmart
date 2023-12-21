<?php

namespace model;

class Section
{
    public int $id;
    public string $name;
    public int $set_value = 0;
    public int $actual_value = 0;
    public string $unit_type = '';

    /**
     * @param int $id
     * @param string $name
     * @param int $set_value
     * @param int $actual_value
     */
    public function __construct(int $id, string $name, int $set_value, int $actual_value, string $unit_type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->set_value = $set_value;
        $this->actual_value = $actual_value;
        $this->unit_type = $unit_type;
    }

    public static function generateDemo1(): Section
    {
        return new Section(
            1,
            "Refrigerator Section",
            20,
            15,
            "C"
        );

    }

    public static function generateDemo2(): Section
    {
        return new Section(
            2,
            "Vegetable Section",
            25,
            5,
            "C"
        );
    }

    public static function generateDemo3(): Section
    {
        return new Section(
            3,
            "Cheese Section",
            19,
            11,
            "C"
        );
    }


}