<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'getContractTable':
        echo json_encode(ContractTDG::getContractTable());
        break;
    case 'saveContractTable':
        echo ContractTDG::saveContractTable(getOV());
        break;
    case 'deleteContractFromList':
        echo ContractTDG::deleteContractFromList(getOV());
        break;
    case 'insert':
        echo json_encode(ContractTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(ContractTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(ContractTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(ContractTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(ContractTDG::get(getId()));
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
