<?php

class ClientTDG implements TDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }

    public static function getAll($filters) {
        
    }

    public static function insert($valueObject) {

//        $conn = pdo_connect();
//
//        $sql = $conn->prepare('INSERT INTO Client (username, password, Employee_id, email, phone, firstName, middleInitial, lastName) 
//                VALUES (:username, :password, :Employee_id, :email, :phone, :firstName, :middleInitial, :lastName) ');
//
//        $sql->bindValue(':username', $valueObject->username);
//        $sql->bindValue(':password', $valueObject->password);
//        $sql->bindValue(':Employee_id', $valueObject->Employee_id);
//        $sql->bindValue(':email', $valueObject->email);
//        $sql->bindValue(':phone', $valueObject->phone);
//        $sql->bindValue(':firstName', $valueObject->firstName);
//        $sql->bindValue(':middleInitial', $valueObject->middleInitial);
//        $sql->bindValue(':lastName', $valueObject->lastName);
//
//        $sql->execute();
//
//        return $conn->lastInsertId(); //Inserted ID
    }

    public static function save($valueObject) {

        if (isset($valueObject->id)) {
            return ClientTDG::update($valueObject);
        } else {
            return ClientTDG::insert($valueObject);
        }
    }

    public static function update($valueObject) {
        
//        $conn = pdo_connect();
//
//        $sql = $conn->prepare('UPDATE Client 
//            SET
//            username = :username,
//            password = :password,
//            Employee_id = :Employee_id,
//            email = :email,
//            phone = :phone,
//            firstName = :firstName,
//            middleInitial = :middleInitial,
//            lastName = :lastName
//            WHERE id = :id  ');
//
//        $sql->bindValue(':id', $valueObject->id);
//        $sql->bindValue(':username', $valueObject->username);
//        $sql->bindValue(':password', $valueObject->password);
//        $sql->bindValue(':Employee_id', $valueObject->Employee_id);
//        $sql->bindValue(':email', $valueObject->email);
//        $sql->bindValue(':phone', $valueObject->phone);
//        $sql->bindValue(':firstName', $valueObject->firstName);
//        $sql->bindValue(':middleInitial', $valueObject->middleInitial);
//        $sql->bindValue(':lastName', $valueObject->lastName);
//
//        $sql->execute();
//
//        return $valueObject->id; //Updated ID
        
    }

    public static function saveClientAndAccount($client) {

        $conn = pdo_connect();
        
        $accountId = AccountTDG::insert($client);
        
        //Client saving part

        $sql = $conn->prepare('INSERT INTO Client (companyName, address, city, 
            postalCode, province, accountId) 
            VALUES (:companyName, :address, :city, 
            :postalCode, :province, :accountId)');

        $sql->bindValue(':companyName', $client->companyName);
        $sql->bindValue(':address', $client->address);
        $sql->bindValue(':city', (isset($client->city) && !empty($client->city) ? $client->city : NULL));
        $sql->bindValue(':postalCode', $client->postalCode);
        $sql->bindValue(':province', (isset($client->province) && !empty($client->province) ? $client->province : NULL));
        $sql->bindValue(':accountId', $accountId);
        

        $sql->execute();

        return $conn->lastInsertId();
    }
    
    
    public static function getAllNames(){
        
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT DISTINCT companyName FROM Client');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach($result AS $entry){
            $returnResult[] = $entry->companyName;
        }
        
        return $returnResult;
    }
    
    public static function getClientHashtable($conn = NULL){
        
        
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('SELECT 
            Client.id AS id,
            Client.companyName
            FROM Client
            ');
        
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        $nameToId = array();
        $idToName = array();

        foreach ($result as $entry) {
            $nameToId[$entry->companyName] = $entry->id;
            $idToName[$entry->id] = $entry->companyName;
        }

        $returnResult = new stdClass();

        $returnResult->nameToId = $nameToId;
        $returnResult->idToName = $idToName;

        return $returnResult;
    }

}