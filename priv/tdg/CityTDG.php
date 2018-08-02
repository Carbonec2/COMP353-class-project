<?php

class CityTDG implements TDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }
    
    public static function getAll($filters){
        
    }

    public static function getProvinceHashTable() {
        
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT City, Province FROM City ');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = array();
        
        foreach($result AS $entry){
            if(!isset($returnResult[$entry->province])){
                $returnResult[$entry->province] = [];
            }
            
            $returnResult[$entry->province][] = $entry->city;
        }
        return $returnResult;//Hashtable of arrays of cities sorted by province
    }

    public static function insert($valueObject) {

        $conn = pdo_connect();

        $sql = $conn->prepare('INSERT INTO City (city, province)
                VALUES (:city, :province) ');

        $sql->bindValue(':city', $valueObject->city);
        $sql->bindValue(':province', $valueObject->province);

        $sql->execute();

        return $conn->lastInsertId(); //Inserted ID
    }

    public static function save($valueObject) {

        if (isset($valueObject->id)) {
            return CityTDG::update($valueObject);
        } else {
            return CityTDG::insert($valueObject);
        }
    }

    public static function update($valueObject) {
        
        $conn = pdo_connect();

        $sql = $conn->prepare('UPDATE City 
            SET
            city = :newCity,
            province = :newProvince,
            WHERE
            city = :city,
            province = :province');

        $sql->bindValue(':newCity,', $valueObject->newCity);
        $sql->bindValue(':newProvince', $valueObject->newProvince);
        $sql->bindValue(':city', $valueObject->city);
        $sql->bindValue(':province', $valueObject->province);
        

        $sql->execute();
        
    }

}