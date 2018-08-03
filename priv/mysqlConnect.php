<?php
function pdo_connect(){
    
    //We should look at the server identifier to have a set of connection strings here for every environment
	
	$user = 'root';
	$pass = '';
	
	$dbh = new PDO('mysql:host=localhost;dbname=ycc353_1', $user, $pass);
        
        //Utf8 character set
        $sql1 = $dbh->prepare('SET CHARACTER SET utf8');
        
        $sql1->execute();
	
	return $dbh;
}
function pdo_disconnect(){
    return null;
}