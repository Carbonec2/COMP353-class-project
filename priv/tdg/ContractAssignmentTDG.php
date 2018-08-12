<?php

class ContractAssignmentTDG implements TDG {

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

        $sql = $conn->prepare('INSERT INTO ContractAssignment VALUES (:cid,:eid,:hrs)');
        $sql->bindValue('cid',$_POST['contract']);
        $sql->bindValue('eid',$valueObject->employeeId);
        $sql->bindValue('hrs', $valueObject->hoursWorked);
        $sql->execute();
    
      
        

        return $conn->lastInsertId();
    }

    public static function save($valueObject, &$conn = NULL) {

        if (isset($valueObject->id)) {
            return ContractAssignmentTDG::update($valueObject, $conn);
        } else {
            return ContractAssignmentTDG::insert($valueObject, $conn);
        }
    }

    public static function update($valueObject, &$conn = NULL) {

        //If we already have a conn, we don't create a new one
        if ($conn == NULL) {
            $conn = pdo_connect();
        }

        

        return; //Return primary key
    }
    
    public static function getContractAssignmentTable(){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT employeeId, firstName, middleInitial,lastName, contractId, hoursWorked FROM ContractAssignment
          JOIN Employee ON Employee.id = ContractAssignment.employeeId
          JOIN Account ON Employee.accountId = Account.id');
        
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        $returnResult = [];
        
        foreach ($result as $entry) {
            //Do something on the data if needed
            $entry->employeeName = "{$entry->firstName} {$entry->middleInitial} {$entry->lastName}";
            $returnResult[] = $entry;
        }
        
        return $returnResult;
    }
    
  public static function saveContractAssignmentTable($assignments) {
        if (empty($_SESSION['userId'])) {
            return;
        }


    $conn = pdo_connect();

    $sql = $conn->prepare('DELETE FROM ContractAssignment WHERE contractId=:cid');
    $sql->bindValue('cid',$_POST['contract']);
    $sql->execute();


    foreach ($assignments as $asg) {
      if (empty($asg->employeeId)) {
        continue;
      }

      ContractAssignmentTDG::save($asg,$conn);
    }
  }

    

}
