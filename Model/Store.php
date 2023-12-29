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

    public static function loadRaw($storeRaw)
    {
        return new Store(
            $storeRaw['id_store'],
            $storeRaw['name'],
            $storeRaw['address']
        );
    }

    public static function getStoresAdmin($userID)
    {
        $DB = new DB();
        $storesRaw = $DB->getAdminStores($userID);
        $stores = [];

        foreach ($storesRaw as $st) {
            $stores[] = new Store(
                $st['id_store'],
                $st['name'],
                $st['address']
            );
        }

        $DB->closeConnection();
        return $stores;
    }

}