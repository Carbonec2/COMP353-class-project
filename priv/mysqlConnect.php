<?php
function pdo_connect(){
    
    //We should look at the server identifier to have a set of connection strings here for every environment
	
	$user = 'root';
	$pass = '';
	
	$dbh = new PDO('mysql:host=localhost;dbname=ycc353_1', $user, $pass);
	
	return $dbh;
}
function pdo_disconnect(){
    return null;
}