<?php

namespace model;

class Device
{
    public string $type = '';
    public string $unit_type = '';
    public string $name = '';
    public int $set_value = 0;
    public int $actual_value = 0;
    public int $section_id = 0;

    /**
     * @param string $type
     * @param string $unit_type
     * @param string $name
     * @param int $set_value
     * @param int $actual_value
     * @param int $section_id
     */
    public function __construct(string $type, string $unit_type, string $name, int $set_value, int $actual_value, int $section_id)
    {
        $this->type = $type;
        $this->unit_type = $unit_type;
        $this->name = $name;
        $this->set_value = $set_value;
        $this->actual_value = $actual_value;
        $this->section_id = $section_id;
    }

    public static function generateDemo()
    {
        return new Device(
            'Temperature',
            'C',
            'Air conditioner 1',
            20,
            0,
            1

        );
    }

    public static function generateDemo2()
    {
        return new Device(
            'Temperature',
            'C',
            'Refrigerator 2',
            220,
            0,
            1

        );
    }

    public static function generateDemo3()
    {
        return new Device(
            'Humidity',
            '%',
            'Sprinkler Fruits',
            70,
            66,
            2
        );
    }

    public static function generateDemo4()
    {
        return new Device(
            'Temperature',
            '%',
            'Sprinkler Veggies',
            60,
            59,
            2
        );
    }

    public static function generateDemo5()
    {
        return new Device(
            'Lights',
            'I',
            'Lights 1',
            20,
            0,
            1
        );
    }
    public static function generateDemo6()
    {
        return new Device(
            'Lights',
            'I',
            'Lights 2',
            20,
            0,
            1
        );
    }
    public static function generateDemo7()
    {
        return new Device(
            'Lights',
            'I',
            'Lights 3',
            20,
            0,
            2
        );
    }

}