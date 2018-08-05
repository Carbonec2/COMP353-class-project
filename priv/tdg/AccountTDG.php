<?php

class AccountTDG implements TDG {

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

        $sql = $conn->prepare('INSERT INTO Account (username, password, email, phone, firstName, middleInitial, lastName) 
                VALUES (:username, :password, :email, :phone, :firstName, :middleInitial, :lastName) ');

        $sql->bindValue(':username', $valueObject->username);
        $sql->bindValue(':password', $valueObject->password);
        $sql->bindValue(':email', $valueObject->email);
        $sql->bindValue(':phone', $valueObject->phone);
        $sql->bindValue(':firstName', $valueObject->firstName);
        $sql->bindValue(':middleInitial', $valueObject->middleInitial);
        $sql->bindValue(':lastName', $valueObject->lastName);

        $sql->execute();

        return $conn->lastInsertId(); //Inserted ID
    }

    public static function save($valueObject) {

        if (isset($valueObject->id)) {
            return AccountTDG::update($valueObject);
        } else {
            return AccountTDG::insert($valueObject);
        }
    }

    public static function update($valueObject) {

        $conn = pdo_connect();

        $sql = $conn->prepare('UPDATE Account 
            SET
            username = :username,
            password = :password,
            email = :email,
            phone = :phone,
            firstName = :firstName,
            middleInitial = :middleInitial,
            lastName = :lastName
            WHERE id = :id  ');

        $sql->bindValue(':id', $valueObject->id);
        $sql->bindValue(':username', $valueObject->username);
        $sql->bindValue(':password', $valueObject->password);
        $sql->bindValue(':email', $valueObject->email);
        $sql->bindValue(':phone', $valueObject->phone);
        $sql->bindValue(':firstName', $valueObject->firstName);
        $sql->bindValue(':middleInitial', $valueObject->middleInitial);
        $sql->bindValue(':lastName', $valueObject->lastName);

        $sql->execute();

        return $valueObject->id; //Updated ID
    }

    public static function checkAuthentification($identifiers) {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT Account.id AS id, username, password, email, phone, 
            firstName, middleInitial, lastName, Employee.id AS employeeId, Employee.accountId AS employeeAccountId,
            Client.id AS clientId, 
            Client.accountId AS clientAccountId,
            Employee.roleType 
            FROM Account 
            LEFT JOIN Employee ON Account.id = Employee.accountId
            LEFT JOIN Client ON Account.id = Client.accountId
            WHERE username = :username AND password = :password
            ');

        $sql->bindValue(':username', $identifiers->username);
        $sql->bindValue(':password', $identifiers->password);

        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_OBJ);

        if (isset($result->id) && !empty($result->id)) {

            //We log in the user
            $_SESSION['userId'] = $result->id;
            $_SESSION['username'] = $result->username;
            $_SESSION['employeeId'] = (isset($result->employeeId)? $result->employeeId : NULL);
            $_SESSION['roleType'] = (isset($result->roleType)? $result->roleType : NULL);
            $_SESSION['clientId'] = (isset($result->clientId)? $result->clientId : NULL);

            $result->authenticated = true;

            return $result;
        } else {
            return false;
        }
    }

}
