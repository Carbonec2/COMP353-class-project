<?php

include_once(dirname(__FILE__) . '/../backendIncludeScript.php');

switch (($_POST['method'])) {
    case 'getContractAssignmentTable':
        echo json_encode(ContractAssignmentTDG::getContractAssignmentTable(getOV()));
        break;
    case 'saveContractAssignmentTable':
        echo ContractAssignmentTDG::saveContractAssignmentTable(getOV(), $_POST['contract']);
        break;
    case 'getPremiumContractDelayedContract':
        echo json_encode(ContractAssignmentTDG::getPremiumContractDelayedContract());
        break;
    case 'monthVentilation':
        echo json_encode(ContractAssignmentTDG::monthVentilation());
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
