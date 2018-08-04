<?php

class RoleTypeTDG implements TDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }
    
    public static function getAll($filters = NULL){
        
        
    }

    public static function getAllNames() {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT roleType FROM RoleType');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach($result AS $entry){
            $returnResult[] = $entry->roleType;
        }
        
        return $returnResult;
    }
    
    
    

    public static function insert($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return RoleTypeTDG::update($valueObject, $conn);
        } else {
            return RoleTypeTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {
        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }
        
    }

}
