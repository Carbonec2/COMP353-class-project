<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {

    case 'insert':
        echo json_encode(LineOfBusinessTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(LineOfBusinessTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(LineOfBusinessTDG::save(getOV()));
        break;

    case 'getAll':
        echo json_encode(LineOfBusinessTDG::getAll());
        break;
    
    case 'get':
        echo json_encode(LineOfBusinessTDG::get(getId()));
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
