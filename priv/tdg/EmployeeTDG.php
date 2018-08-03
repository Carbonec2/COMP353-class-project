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

        if (isset($valueObject->id)) {
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
            LEFT JOIN Account ON Employee.accoundId = Account.id
            ORDER BY Employee.id');

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public static function saveEmployeeTable($valueObject) {

        $conn = pdo_connect();

        //We save the account first, get the generated id and use it for Employee table
        
        $accountId = AccountTDG::save($valueObject);
        
        $valueObject->accountId = $accountId;
        
        $employeeId = EmployeeTDG::save($valueObject);

        return $employeeId;
    }

}