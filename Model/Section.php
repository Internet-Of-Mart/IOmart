<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');

use Util\DB;

class Section
{
    public int $id;
    public string $name;
    public int $set_value = 0; //FIXME: Remove
    public int $actual_value = 0; //FIXME: Remove
    public string $unit_type = ''; //FIXME: Remove
    public int $store_id = 0;

    public function __construct(int $id, string $name, int $set_value, int $actual_value, string $unit_type, int $store_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->set_value = $set_value;
        $this->actual_value = $actual_value;
        $this->unit_type = $unit_type;
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


}