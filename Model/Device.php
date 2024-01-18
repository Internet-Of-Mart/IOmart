<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');
use Util\DB;

class Device
{
    public int $id;
    public int $section_id; //Why string?
    public string $name;
    public int $type;
    public string $type_name;
    public int $state;
    public int $set_value;
    public string $unit_type;
    public int $actual_value;
    //    public string $maintenance;


    public function __construct(int $id, int $section_id, string $name, int $type , string $type_name, int $state,  int $set_value, string $unit_type, int $actual_value /* string $maintenance*/)
    {
        $this->id = $id;
        $this->type = $type;
        $this->type_name = $type_name;
        $this->unit_type = $unit_type;
        $this->name = $name;
        $this->state = $state;
        $this->set_value = $set_value;
        $this->actual_value = $actual_value;
        $this->section_id = $section_id;
//        $this->maintenance = $maintenance;
    }

    public static function loadRaw($deviceRaw): Device
    {
        return new Device(
            $deviceRaw['id_device'],
            $deviceRaw['device_section_id'],
            $deviceRaw['name'],
            $deviceRaw['device_type_id'],
            $deviceRaw['typeName'],
            $deviceRaw['state'],
            $deviceRaw['set_value'],
            $deviceRaw['unit_type'],
            $deviceRaw['actual_value'],
//            $deviceRaw['maintenance'], Date datatype
        );
    }

    /** Get ALL Device Data of Type in a Section */
    public static function getSectionDeviceData($section_id,$type_name): array
    {
        $DB = new DB();
        $deviceRaw = $DB->getSectionDeviceData($section_id,$type_name);
        $DB->closeConnection();

        $devices = [];

        foreach ($deviceRaw as $dv) {
            $devices[] = self::loadRaw($dv);
        }

        return $devices;

    }

    public static function getStoreDeviceData($store_id,$type): array
    {
        $DB = new DB();
        $deviceRaw = $DB->getStoreDeviceData($store_id,$type);
        $DB->closeConnection();

        $devices = [];

        foreach ($deviceRaw as $dv) {
            $devices[] = self::loadRaw($dv);
        }

        return $devices;
    }



}
