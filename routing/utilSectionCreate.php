<?php


include $_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php';
use model\Section;

Section::create($_POST['store_id'] ,$_POST['name']);

header('location:../Views/SectionManagement.php');