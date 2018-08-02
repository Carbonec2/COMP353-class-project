<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (strtolower($_POST['method'])) {
    case 'checkAuthentification':
        echo json_encode(AccountTDG::checkAuthentification(getOV()));
        break;
    case 'insert':
        echo json_encode(AccountTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(AccountTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(AccountTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(AccountTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(AccountTDG::get(getId()));
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
