<?php

class SaleRecordTDG implements TDG {

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

        $sql = $conn->prepare('INSERT INTO SaleRecord (
            contractId,
            employeeId,
            initialValue,
            annualValue,
            recordedDate)
            VALUES 
            (
            :contractId,
            :employeeId,
            :initialValue,
            :annualValue,
            :recordedDate)');

        $sql->bindValue(':contractId', $valueObject->contractId);
        $sql->bindValue(':employeeId', $valueObject->employeeId);
        $sql->bindValue(':initialValue', $valueObject->initialValue);
        $sql->bindValue(':annualValue', $valueObject->annualValue);
        $sql->bindValue(':recordedDate', 'NOW()');

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return SaleRecordTDG::update($valueObject, $conn);
        } else {
            return SaleRecordTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('UPDATE SaleRecord SET 
            contractId = :contractId,
            employeeId = :employeeId,
            initialValue = :initialValue,
            annualValue = :annualValue,
            recordedDate = :recordedDate
            WHERE contractId = :contractId AND employeeId = :employeeId');

        $sql->bindValue(':contractId', $valueObject->contractId);
        $sql->bindValue(':employeeId', $valueObject->employeeId);
        $sql->bindValue(':initialValue', $valueObject->initialValue);
        $sql->bindValue(':annualValue', $valueObject->annualValue);
        $sql->bindValue(':recordedDate', 'NOW()');
        
        $sql->execute();

        return $valueObject->contractId;
    }

}
