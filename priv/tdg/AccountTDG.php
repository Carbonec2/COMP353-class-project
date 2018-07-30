<?php

class AccountTDG implements TDG{
    
    
    
    
    public static function delete($index) {
        
    }

    public static function get($index) {
        
    }

    public static function getAll($filters) {
        
    }

    public static function insert($valueObject) {
        
    }

    public static function save($valueObject) {
        
    }

    public static function update($valueObject) {
        
    }
    
    public static function checkAuthentification($identifiers){
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT * FROM Account WHERE username = :username AND password = :password');
        
        $sql->bindValue(':username', $identifiers->username);
        $sql->bindValue(':password', $identifiers->password);
        
        $sql->execute();
        
        $result = $sql->fetch(PDO::FETCH_OBJ);
        
        if(isset($result->id) && !empty($result->id)){
            
            //We log in the user
            $_SESSION['userId'] = $result->id;
            
            $result->authenticated = true;
            
            return $result;
        }
        else
        {
            return false;
        }
        
    }

}