<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'getWorkChoiceTable':
        echo json_encode(WorkChoiceTDG::getWorkChoiceTable(getOV()));
        break;
    case 'saveWorkChoiceTable':
        echo WorkChoiceTDG::saveWorkChoiceTable(getOV());
        break;
    case 'insert':
        echo json_encode(WorkChoiceTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(WorkChoiceTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(WorkChoiceTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(WorkChoiceTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(WorkChoiceTDG::get(getId()));
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
