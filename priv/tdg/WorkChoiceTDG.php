<?php

class WorkChoiceTDG implements TDG {

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
            return WorkChoiceTDG::update($valueObject, $conn);
        } else {
            return WorkChoiceTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        

        return; //Return primary key
    }
    
    public static function getWorkChoiceTable(){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT employeeId, contractType, platformType FROM WorkChoice');
        
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach ($result as $entry) {
            //Do something on the data if needed
            $returnResult[] = $entry;
        }
        
        return $returnResult;
    }

  public static function saveWorkChoiceTable($workChoices) {
        if (empty($_SESSION['userId'])) {
            return;
        }


    $conn = pdo_connect();

    foreach ($workChoices as $wc) {
      if (empty($entry->contractType) || empty($entry->platformType)) {
        continue;
      }

      WorkChoiceTDG::save($wc,$conn);
    }
  }

}
