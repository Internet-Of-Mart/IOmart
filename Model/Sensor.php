<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');

use Util\DB;

class Sensor
{
    public string $type = '';
    public string $unit_type = '';
    public string $name = '';
    public int $actual_value = 0;

    /**
     * @param string $type
     * @param string $unit_type
     * @param string $name
     * @param int $actual_value
     */
    public function __construct(string $type, string $unit_type, string $name, int $actual_value)
    {
        $this->type = $type;
        $this->unit_type = $unit_type;
        $this->name = $name;
        $this->actual_value = $actual_value;
    }

    public static function generateDemo()
    {
        return new Sensor(
            'Temperature',
            'C',
            'Hallway A temps',
            0
        );
    }

    public static function generateDemo2()
    {
        return new Sensor(
            'Temperature',
            'C',
            'Hallway B temps',
            0
        );
    }

    public static function create(array $sensor): int
    {
        $DB = new DB();
        $newSensor = $DB->creteSensor($sensor);
        $DB->closeConnection();
        return $newSensor;
    }

    public static function addData($sensor_id, $value, $time): bool
    {
        $DB = new DB();
        $newData = $DB->addDataPoint($sensor_id, $value, $time);
        $DB->closeConnection();

        return $newData;
    }

    public static function delete($senID): bool
    {
        $DB = new DB();
        $newData = $DB->deleteSensor($senID);
        $DB->closeConnection();

        return $newData;
    }

}