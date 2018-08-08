<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'getEmployeeTable':
        echo json_encode(EmployeeTDG::getEmployeeTable());
        break;
    case 'saveEmployeeTable':
        echo EmployeeTDG::saveEmployeeTable(getOV());
        break;
    case 'getManagerHashtable':
        echo json_encode(EmployeeTDG::getManagerHashtable());
        break;
    
    case 'getEmployeeHashtable':
        echo json_encode(EmployeeTDG::getEmployeeHashtable());
        break;
    case 'getInterestedEmployees':
      echo json_encode(EmployeeTDG::getInterestedEmployees($_POST['contract']));
      break;
    case 'insert':
        echo json_encode(EmployeeTDG::insert(getOV()));
        break;
    case 'update':
        echo json_encode(EmployeeTDG::update(getOV()));
        break;
    case 'save':
        echo json_encode(EmployeeTDG::save(getOV()));
        break;
    
    //Not used yet
    case 'getall':
        echo json_encode(EmployeeTDG::getAll(getFilters()));
        break;
    case 'get':
        echo json_encode(EmployeeTDG::get(getId()));
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
