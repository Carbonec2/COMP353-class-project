<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {

    case 'getAllNames':
        echo json_encode(PlatformTypeTDG::getAllNames());
        break;
    case 'insert':
        echo json_encode(PlatformTypeTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(PlatformTypeTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(PlatformTypeTDG::save(getOV()));
        break;

    case 'getAll':
        echo json_encode(PlatformTypeTDG::getAll());
        break;
    
    case 'get':
        echo json_encode(PlatformTypeTDG::get(getId()));
        break;
}

function getOV() {
    return json_decode($_POST['OV']);
}

function getFilters() {
    return json_decode($_POST['filters']);
}

function getId() {
    return $_POST['id'];
}
