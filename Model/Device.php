<?php

namespace model;

class Device
{
    public string $type = '';
    public string $unit_type = '';
    public string $name = '';
    public int $set_value = 0;
    public int $actual_value = 0;

    /**
     * @param string $type
     * @param string $unit_type
     * @param string $name
     * @param int $set_value
     * @param int $actual_value
     */
    public function __construct(string $type, string $unit_type, string $name, int $set_value, int $actual_value)
    {
        $this->type = $type;
        $this->unit_type = $unit_type;
        $this->name = $name;
        $this->set_value = $set_value;
        $this->actual_value = $actual_value;
    }

    public static function generateDemo()
    {
        return new Device(
            'Temperature',
            'C',
            'Hallway A temps',
            20,
            0
        );
    }

    public static function generateDemo2()
    {
        return new Device(
            'Temperature',
            'K',
            'Hallway B temps',
            220,
            0
        );
    }

}