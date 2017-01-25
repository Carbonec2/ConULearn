<?php

function pdo_connect(){
	
	$user = 'root';
	$pass = '';
	
	$dbh = new PDO('mysql:host=localhost;dbname=soen', $user, $pass);
	
	return $dbh;
}

function pdo_disconnect(){
    return null;
}