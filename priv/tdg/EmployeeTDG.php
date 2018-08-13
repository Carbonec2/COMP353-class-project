<?php

class EmployeeTDG implements TDG {

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

        $sql = $conn->prepare('INSERT INTO Employee (
            lineOfBusinessName,
            insurancePlanName,
            roleType,
            weeklyHours,
            accountId,
            city,
            province)
            VALUES 
            (
            :lineOfBusinessName,
            :insurancePlanName,
            :roleType,
            :weeklyHours,
            :accountId,
            :city,
            :province)');

        $sql->bindValue(':lineOfBusinessName', $valueObject->lineOfBusinessName);
        $sql->bindValue(':insurancePlanName', $valueObject->insurancePlanName);
        $sql->bindValue(':roleType', $valueObject->roleType);
        $sql->bindValue(':weeklyHours', $valueObject->weeklyHours);
        $sql->bindValue(':accountId', $valueObject->accountId);
        $sql->bindValue(':city', $valueObject->city);
        $sql->bindValue(':province', $valueObject->province);

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id) && !empty($valueObject->id)) {
            return EmployeeTDG::update($valueObject, $conn);
        } else {
            return EmployeeTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('UPDATE Employee SET 
            lineOfBusinessName = :lineOfBusinessName,
            insurancePlanName = :insurancePlanName,
            roleType = :roleType,
            weeklyHours = :weeklyHours,
            accountId = :accountId,
            city = :city,
            province = :province
            WHERE id = :id');

        $sql->bindValue(':id', $valueObject->id);
        $sql->bindValue(':lineOfBusinessName', $valueObject->lineOfBusinessName);
        $sql->bindValue(':insurancePlanName', $valueObject->insurancePlanName);
        $sql->bindValue(':roleType', $valueObject->roleType);
        $sql->bindValue(':weeklyHours', $valueObject->weeklyHours);
        $sql->bindValue(':accountId', $valueObject->accountId);
        $sql->bindValue(':city', $valueObject->city);
        $sql->bindValue(':province', $valueObject->province);

        $sql->execute();

        return $valueObject->id;
    }

    public static function getEmployeeTable() {

        if (empty($_SESSION['userId'])) {
            return;
        }

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            Employee.id AS id, 
            lineOfBusinessName, 
            insurancePlanName,
            roleType,
            weeklyHours,
            accountId,
            city,
            province,
            username,
            password,
            email,
            phone,
            firstName,
            middleInitial,
            lastName
            FROM Employee
            LEFT JOIN Account ON Employee.accountId = Account.id
            ORDER BY Employee.id');

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getInterestedEmployees($contractId) {
        if (empty($_SESSION['userId'])) {
            return;
        }

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            Employee.id AS id, 
            firstName,
            middleInitial,
            lastName
            FROM Employee
            JOIN Account ON Employee.accountId = Account.id
            JOIN WorkChoice ON Employee.id = WorkChoice.employeeId
            JOIN Contract ON (Contract.platformType = WorkChoice.platformType AND Contract.contractType = WorkChoice.contractType)
            WHERE Contract.id=:cid
            ORDER BY Employee.id');

        $sql->bindValue('cid',$contractId);
        $sql->execute();

        $result =  $sql->fetchAll(PDO::FETCH_OBJ);

        $nameToId = array();
        $idToName = array();

        foreach ($result as $entry) {
            $nameToId[$entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName] = $entry->id;
            $idToName[$entry->id] = $entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName;
        }

        $returnResult = new stdClass();

        $returnResult->nameToId = $nameToId;
        $returnResult->idToName = $idToName;

        return $returnResult;

    }
    

    public static function saveEmployeeTable($valueObject) {

        if (empty($_SESSION['userId'])) {
            return;
        }

        $conn = pdo_connect();

        foreach ($valueObject AS $entry) {

            //If it looks like it is an empty line, we skip it without saving
            if (empty($entry->username) && empty($entry->lineOfBusinessName)) {
                continue;
            }


            //We save the account first, get the generated id and use it for Employee table

            if (isset($entry->id) && !empty($entry->id)) {
                $employeeId = $entry->id;
            }

            if (isset($entry->accountId) && !empty($entry->accountId)) {
                $entry->id = $entry->accountId;
            } else {
                $entry->id = NULL;
            }

            $accountId = AccountTDG::save($entry);

            if (isset($entry->id) && !empty($entry->id)) {
                $entry->id = $employeeId;
            }

            $entry->accountId = $accountId;

            $employeeId = EmployeeTDG::save($entry);
        }

        return true;
    }

    public static function getManagerHashtable(&$conn = NULL) {

        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('SELECT 
            Employee.id AS id,
            Employee.roleType,
            Account.firstName, 
            Account.middleInitial, 
            Account.lastName
            FROM Employee
            LEFT JOIN Account ON Employee.accountId = Account.id
            WHERE Employee.roleType = "Manager"
            ');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        $nameToId = array();
        $idToName = array();

        foreach ($result as $entry) {
            $nameToId[$entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName] = $entry->id;
            $idToName[$entry->id] = $entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName;
        }

        $returnResult = new stdClass();

        $returnResult->nameToId = $nameToId;
        $returnResult->idToName = $idToName;

        return $returnResult;
    }

    public static function getEmployeeHashtable(&$conn = NULL) {

        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('SELECT 
            Employee.id AS id,
            Account.firstName, 
            Account.middleInitial, 
            Account.lastName
            FROM Employee
            LEFT JOIN Account ON Employee.accountId = Account.id
            ');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        $nameToId = array();
        $idToName = array();

        foreach ($result as $entry) {
            $nameToId[$entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName] = $entry->id;
            $idToName[$entry->id] = $entry->firstName . ' ' . $entry->middleInitial . ' ' . $entry->lastName;
        }

        $returnResult = new stdClass();

        $returnResult->nameToId = $nameToId;
        $returnResult->idToName = $idToName;

        return $returnResult;
    }
    
    public static function getPremiumLessSixtyHoursTable(){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT Employee.id AS employeeId, firstName, 
            middleInitial, lastName, weeklyHours
            
            FROM Employee 
            LEFT JOIN Account ON Employee.accountId = Account.id
            WHERE insurancePlanName = "Premium" 
            GROUP BY Employee.id
            HAVING sum(weeklyHours * 4) < 60');
        
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
        
    }
    
    

}
