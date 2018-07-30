<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (strtolower($_POST['method'])) {
    case 'checkAuthentification':
        json_encode(AccountTDG::checkAuthentification(getOV()));
        break;
    
    
    //Not used yet
    case 'insert':
        AccountTDG::insert(getOV());
        break;
    case 'update':
        AccountTDG::update(getOV());
        break;
    case 'save':
        AccountTDG::save(getOV());
        break;
    case 'getall':
        AccountTDG::getAll(getFilters());
        break;
    case 'get':
        AccountTDG::get(getId());
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
