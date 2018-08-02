<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'saveClientAndAccount':
        echo (ClientTDG::saveClientAndAccount(getOV()));
        break;
    case 'insert':
        echo json_encode(ClientTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(ClientTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(ClientTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(ClientTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(ClientTDG::get(getId()));
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
