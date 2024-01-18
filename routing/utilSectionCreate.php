<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Store.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php');

use model\Store;
use model\Section;

Section::CreateSection($_POST['name'],Store::getStoreUsers()->store_id);
header('location:../views/SectionManagement.php');

