<?php

class ContractAssignmentTDG {

    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }

    public static function getAll($filters) {
        
    }

    public static function insert($valueObject, $contractId, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('INSERT INTO ContractAssignment 
            (contractId, employeeId, hoursWorked) 
            VALUES (:contractId,:employeeId,:hoursWorked)');

        $sql->bindValue(':contractId', (int)$contractId);
        $sql->bindValue(':employeeId', (int)$valueObject->employeeId);
        $sql->bindValue(':hoursWorked', (float)$valueObject->hoursWorked);
        
        $sql->execute();

        return;
    }

    public static function save($valueObject, $contractId, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return ContractAssignmentTDG::update($valueObject, $contractId, $conn);
        } else {
            return ContractAssignmentTDG::insert($valueObject, $contractId, $conn);
        }
    }

    public static function update($valueObject, $contractId, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }



        return; //Return primary key
    }

    public static function getContractAssignmentTable($cid) {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT employeeId, firstName, middleInitial,
            Contract.contractType AS contractType,
            Contract.serviceStartDate,
            Client.companyName,
            lastName, contractId, hoursWorked 
            FROM ContractAssignment
          JOIN Employee ON Employee.id = ContractAssignment.employeeId
          JOIN Account ON Employee.accountId = Account.id
          LEFT JOIN Contract ON ContractAssignment.contractId = Contract.id
          LEFT JOIN Client ON Client.id = Contract.clientId
          WHERE ContractAssignment.contractId = :contractId');

        $sql->bindValue(':contractId', $cid);

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        $returnResult = [];

        foreach ($result as $entry) {
            //Do something on the data if needed
            $entry->employeeName = "{$entry->firstName} {$entry->middleInitial} {$entry->lastName}";
            $entry->contractName = '' . $entry->contractId . ' - ' . $entry->companyName . ' ' . $entry->contractType . ' ' . $entry->serviceStartDate . '';
            $returnResult[] = $entry;
        }

        return $returnResult;
    }

    public static function saveContractAssignmentTable($assignments, $contractId) {
        if (empty($_SESSION['userId'])) {
            return;
        }


        $conn = pdo_connect();

        $sql = $conn->prepare('DELETE FROM ContractAssignment WHERE contractId=:cid');
        $sql->bindValue(':cid', $contractId);
        $sql->execute();

        $temp;

        foreach ($assignments as $asg) {
            if (empty($asg->employeeId)) {
                continue;
            }

            $temp = ContractAssignmentTDG::save($asg, $contractId, $conn);
        }
    }
    
    public static function getPremiumContractDelayedContract(){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT ContractAssignment.contractId, 
            Contract.serviceStartDate, 
            Contract.serviceEndDate,
            Client.companyName

            FROM ContractAssignment
            LEFT JOIN Contract ON ContractAssignment.contractId = Contract.id
            LEFT JOIN Employee ON ContractAssignment.employeeId = Employee.id
            LEFT JOIN Client ON Contract.clientId = Client.id

            WHERE serviceEndDate > DATE_ADD(Contract.serviceStartDate, INTERVAL 10 DAY) AND Employee.insurancePlanName = "Silver" 
            AND Contract.contractType = "Premium"
            GROUP BY Contract.id
            HAVING COUNT(Employee.id) > 35');

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }

    public static function monthVentilation(){
        $conn= pdo_connect();
        
        $sql = $conn->prepare('SELECT Contract.id, Contract.serviceStartDate, Contract.serviceEndDate, 
            DeliverableStandard.dueAfter,
            Contract.contractType,
            DATE_ADD(Contract.serviceStartDate, INTERVAL DeliverableStandard.dueAfter DAY) AS theoricalDueDate
            FROM ContractAssignment
            LEFT JOIN Contract ON Contract.id = ContractAssignment.contractId
            LEFT JOIN DeliverableStandard ON Contract.contractType = DeliverableStandard.contractType
            WHERE deliverable = "First"
            AND serviceStartDate < "2017-12-31" AND serviceStartDate > "2017-01-01"
            ORDER BY serviceStartDate');
        
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_OBJ);
        
    }
    
    
}
