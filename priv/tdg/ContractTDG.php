<?php

class ContractTDG implements TDG {

    public static function delete($index) {
        
        $conn = pdo_connect();
        
        $sql=$conn->prepare('DELETE FROM Contract WHERE id = :id');
        
        $sql->bindValue(':id', $index);
        
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

        $sql = $conn->prepare('INSERT INTO Contract (
            contractType,
            managerId,
            serviceStartDate,
            serviceEndDate,
            platformType,
            satisfactionScore,
            clientId)
            VALUES 
            (
            :contractType,
            :managerId,
            :serviceStartDate,
            :serviceEndDate,
            :platformType,
            :satisfactionScore,
            :clientId)');

        $sql->bindValue(':contractType', $valueObject->contractType);
        $sql->bindValue(':managerId', $valueObject->managerId);
        //$sql->bindValue(':annualContractValue', $valueObject->annualContractValue);
        //$sql->bindValue(':initialAmount', $valueObject->initialAmount);
        $sql->bindValue(':serviceStartDate', !empty($valueObject->serviceStartDate) ? $valueObject->serviceStartDate : NULL);
        $sql->bindValue(':serviceEndDate', !empty($valueObject->serviceEndDate) ? $valueObject->serviceEndDate : NULL);
        $sql->bindValue(':platformType', $valueObject->platformType);
        $sql->bindValue(':satisfactionScore', $valueObject->satisfactionScore);
        $sql->bindValue(':clientId', $valueObject->clientId);

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return ContractTDG::update($valueObject, $conn);
        } else {
            return ContractTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        $sql = $conn->prepare('UPDATE Contract SET 
            contractType = :contractType,
            managerId = :managerId,
            serviceStartDate = :serviceStartDate,
            serviceEndDate = :serviceEndDate,
            platformType = :platformType,
            satisfactionScore = :satisfactionScore,
            clientId = :clientId
            WHERE id = :id');

        $sql->bindValue(':id', $valueObject->id);
        $sql->bindValue(':contractType', $valueObject->contractType);
        $sql->bindValue(':managerId', $valueObject->managerId);
        //$sql->bindValue(':annualContractValue', $valueObject->annualContractValue);
        //$sql->bindValue(':initialAmount', $valueObject->initialAmount);
        $sql->bindValue(':serviceStartDate', $valueObject->serviceStartDate);
        $sql->bindValue(':serviceEndDate', $valueObject->serviceEndDate);
        $sql->bindValue(':platformType', $valueObject->platformType);
        $sql->bindValue(':satisfactionScore', $valueObject->satisfactionScore);
        $sql->bindValue(':clientId', $valueObject->clientId);

        $sql->execute();

        return $valueObject->id;
    }

    public static function getContractTable() {

        if (empty($_SESSION['userId'])) {
            return;
        }

        $conn = pdo_connect();

        //If the viewer is a client
        $clientRestriction = '';

        //We fetch the contract list related to the role
        if (isset($_SESSION['roleType'])) {
            switch ($_SESSION['roleType']) {
                case 'Manager':
                    //He must see all contracts to be able to allocate employees on it 
                    //(Many to many, so a link on every contract to a contract allocation page (ContractAssignment table)
                    break;
                case 'Sales Associate':
                    //He must see all contracts + can assign a contract manager
                    break;
                case 'Employee':
                    //Nothing to see here
                    return;
                    break;
                case 'Admin':
                    //Can see and update everything
                    //Can remove everything
                    break;
            }
        }

        if (isset($_SESSION['clientId'])) {
            //We add this restriction
            $clientRestriction = ' AND Contract.clientId = :clientId ';
        }

        $sql = $conn->prepare('SELECT 
            Contract.id AS id, 
            contractType, 
            managerId,
            Account.firstName,
            Account.middleInitial,
            Account.lastName,
            serviceStartDate,
            serviceEndDate,
            platformType,
            satisfactionScore,
            SaleRecord.initialValue,
            SaleRecord.annualValue,
            SaleRecord.recordedDate,
            clientId,
            Client.companyName
            FROM Contract
            LEFT JOIN Client ON Contract.clientId = Client.id
            LEFT JOIN SaleRecord ON Contract.id = SaleRecord.contractId
            LEFT JOIN Employee ON Employee.id = Contract.managerId
            LEFT JOIN Account ON Account.id = Employee.accountId
            WHERE 1 = 1 ' . $clientRestriction . '
            ORDER BY Contract.id');

        //We fetch the contract list related to the role
        if (isset($_SESSION['roleType'])) {
            switch ($_SESSION['roleType']) {
                case 'Manager':
                    //He must see all contracts to be able to allocate employees on it 
                    //(Many to many, so a link on every contract to a contract allocation page (ContractAssignment table)
                    break;
                case 'Sales Associate':
                    //He must see all contracts + can assign a contract manager
                    break;
                case 'Admin':
                    //Can see and update everything
                    //Can remove everything
                    break;
            }
        }

        if (isset($_SESSION['clientId'])) {
            //We add this restriction if it is a client
            $sql->bindValue(':clientId', $_SESSION['clientId']);
        }

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach ($result as $entry) {
            
            $entry->managerName = $entry->firstName.' '.$entry->middleInitial.' '.$entry->lastName;
            
            $returnResult[] = $entry;
        }
        
        return $returnResult;
    }

    public static function saveContractTable($valueObject) {

        if (empty($_SESSION['userId'])) {
            return;
        }

        $conn = pdo_connect();

        foreach ($valueObject AS $entry) {

            //If it looks like it is an empty line, we skip it without saving
            if (empty($entry->contractType) && empty($entry->platformType)) {
                continue;
            }

            $contractId = ContractTDG::save($entry, $conn);

            //We should save the SaleRecord if it is newly inserted?
            //If it doesn't have an ID, it is a new entry
            //if (empty($entry->id)) {

                $entry->contractId = $contractId;
                $entry->employeeId = $_SESSION['employeeId'];

                SaleRecordTDG::save($entry, $conn);
            //}
        }
    }
    
    public static function deleteContractFromList($valueObject){
        
        
        foreach ($valueObject AS $entry) {
            
            SaleRecordTDG::delete($entry);
            
            ContractTDG::delete($entry);
            
        }
        
    }

}
