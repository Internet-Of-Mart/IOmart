<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Model/Section.php';
use model\Section;

Section::delete($_POST['section_id']);

header('location:../Views/SectionManagement.php');