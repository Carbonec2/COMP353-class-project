<?php

class ContractAssignmentTDG implements TDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }

    public static function getAll($filters) {
        
    }

    public static function insert($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return ContractAssignmentTDG::update($valueObject, $conn);
        } else {
            return ContractAssignmentTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        

        return; //Return primary key
    }
    
    public static function getContractAssignmentTable(){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT employeeId, contractId, hoursWorked FROM ContractAssignment');
        
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach ($result as $entry) {
            //Do something on the data if needed
            $returnResult[] = $entry;
        }
        
        return $returnResult;
    }

}
