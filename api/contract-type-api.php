<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {

    case 'getAllNames':
        echo json_encode(ContractTypeTDG::getAllNames());
        break;
    case 'insert':
        echo json_encode(ContractTypeTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(ContractTypeTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(ContractTypeTDG::save(getOV()));
        break;

    case 'getAll':
        echo json_encode(ContractTypeTDG::getAll());
        break;
    
    case 'get':
        echo json_encode(ContractTypeTDG::get(getId()));
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
