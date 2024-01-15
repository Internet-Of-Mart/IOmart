<?php

namespace model;

include_once($_SERVER['DOCUMENT_ROOT'] . '/Util/DB.php');
use Util\DB;

class Store
{
    public string $id;
    public string $name;
    public string $address;

    public function __construct(string $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public static function loadRaw($storeRaw): Store
    {
        return new Store(
            $storeRaw['id_store'],
            $storeRaw['name'],
            $storeRaw['address']
        );
    }

    public static function getStoresAdmin($userID): array
    {
        $DB = new DB();
        $storesRaw = $DB->getAdminStores($userID);
        $stores = [];

        foreach ($storesRaw as $st) {
            $stores[] = self::loadRaw($st);
        }

        $DB->closeConnection();
        return $stores;
    }

    public static function getStoreUsers($storeID): array
    {
        $DB = new DB();
        $usersRaw = $DB->getStoreUsers($storeID);
        $users = [];

        foreach ($usersRaw as $uR) {
            $users[] = User::loadRaw($uR);
        }

        return $users;
    }

    public static function getUserStores($userID): array
    {
        $DB = new DB();
        $storesRaw = $DB->getUserStores($userID);
        $stores = [];

        foreach ($storesRaw as $st) {
            $stores[] = self::loadRaw($st);
        }

        $DB->closeConnection();
        return $stores;
    }

    public static function getStoreTypeData($sensorType, $storeID): array
    {
        $DB = new DB();
        $dataRaw = $DB->getStoreSensorTypeData($sensorType, $storeID);
        $data = [];

        foreach ($dataRaw as $dataRow) {
            $data[] = json_encode($dataRow);
        }

        $DB->closeConnection();
        return $data;
    }

}