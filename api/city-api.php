<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'getProvinceHashTable':
        echo json_encode(CityTDG::getProvinceHashTable());
        break;
    case 'insert':
        echo json_encode(CityTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(CityTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(CityTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(CityTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(CityTDG::get(getId()));
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
