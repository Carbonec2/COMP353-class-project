<?php

class SaleRecordTDG implements TDG {

    public static function delete($index) {
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('DELETE FROM SaleRecord WHERE contractId = :contractId');
        
        $sql->bindValue('contractId', $index);
        
        $sql->execute();
        
        return $index;
        
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
            NOW())');

        $sql->bindValue(':contractId', $valueObject->contractId);
        $sql->bindValue(':employeeId', $valueObject->employeeId);
        $sql->bindValue(':initialValue', (!empty($valueObject->initialValue) ? $valueObject->initialValue : NULL));
        $sql->bindValue(':annualValue', (!empty($valueObject->annualValue) ? $valueObject->annualValue : NULL));
        //$sql->bindValue(':recordedDate', 'NOW()');

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->recordedDate)) { //Since it is auto-generated
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
            annualValue = :annualValue
            WHERE contractId = :contractId AND employeeId = :employeeId');

        $sql->bindValue(':contractId', $valueObject->contractId);
        $sql->bindValue(':employeeId', $valueObject->employeeId);
        $sql->bindValue(':initialValue', $valueObject->initialValue);
        $sql->bindValue(':annualValue', $valueObject->annualValue);

        $sql->execute();

        return $valueObject->contractId;
    }

}
