<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {

    case 'insert':
        echo json_encode(InsurancePlanTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(InsurancePlanTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(InsurancePlanTDG::save(getOV()));
        break;

    case 'getAllNames':
        echo json_encode(InsurancePlanTDG::getAllNames());
        break;
    
    case 'getAll':
        echo json_encode(InsurancePlanTDG::getAll());
        break;
    
    case 'get':
        echo json_encode(InsurancePlanTDG::get(getId()));
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
