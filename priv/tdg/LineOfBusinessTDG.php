<?php

class LineOfBusinessTDG implements TDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }

    public static function getAll($filters = NULL) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT lineOfBusinessName FROM LineOfBusiness');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach($result AS $entry){
            $returnResult[] = $entry->lineOfBusinessName;
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
            return LineOfBusinessTDG::update($valueObject, $conn);
        } else {
            return LineOfBusinessTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {
        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }
        
    }

}
