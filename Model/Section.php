<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');

use Util\DB;

class Section
{
    public int $id;
    public string $name;
    public int $store_id = 0;

    public function __construct(int $id, string $name, int $store_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->store_id = $store_id;
    }

    public static function generateDemo1(): Section
    {
        return new Section(
            1,
            "Refrigerator Section",
            20,
            15,
            "C",
            0
        );

    }

    public static function generateDemo2(): Section
    {
        return new Section(
            2,
            "Vegetable Section",
            25,
            5,
            "C",
            0
        );
    }

    public static function generateDemo3(): Section
    {
        return new Section(
            3,
            "Cheese Section",
            19,
            11,
            "C",
            0
        );
    }

    public static function loadRaw($sectionRaw)
    {
        return new Section(
            $sectionRaw['id_section'],
            $sectionRaw['name'],
            0,
            0,
            0,
            $sectionRaw['store_id']
        );

    }

    public static function getStoreSections($storeID): array
    {
        $DB = new DB();
        $sectionsRaw = $DB->getStoreSections($storeID);
        $DB->closeConnection();

        $sections = [];

        foreach ($sectionsRaw as $sc) {
            $sections[] = self::loadRaw($sc);
        }

        return $sections;

    }

    public static function delete(int $section_id)
    {
        $DB = new DB();
        $sect = $DB->deleteSection($section_id);
        $DB->closeConnection();
    }

    public function getSectionDeviceAggregate(): array
    {
        $DB = new DB();
        $devicesPresent = [
            'Temperature' => 0,
            'Humidity' => 0,
            'Light' => 0,
        ];
        foreach ($DB->getDeviceTypeSection($this->id) as $device) {
            $devicesPresent[$device['name']] = $device['amount'];
        }
        $DB->closeConnection();

        return $devicesPresent;

    }

    public static function create(int $storeId, string $name)
    {
        $DB = new DB();
        $sect = $DB->createSection($storeId, $name);
        $DB->closeConnection();
    }



}