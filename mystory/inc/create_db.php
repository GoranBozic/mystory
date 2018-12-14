<?php

 require 'config.php';

 //Connect to db
$conn = new mysqli (SERVER_NAME,USERNAME,PASSWORD);

if ($conn->connect_error){
	die();
}

//Select db
$db_select = mysqli_select_db($conn, 'mystory');

//If db doesn't exist,create db
if (!$db_select){

	$sql = "CREATE DATABASE my_story CHARACTER SET utf8 COLLATE utf8_unicode_ci";
	$query = $conn->query($sql);

	//Select db
	$db_select = mysqli_select_db($conn, 'my_story');

	//Create tables
	$table1 = "CREATE TABLE posts(
		id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		post VARCHAR(512) NOT NULL,
		user VARCHAR(40) NOT NULL,
		day VARCHAR(9) NOT NULL,
		good INT(4),
		bad INT(4))";

	$table2 = "CREATE TABLE comments(
		id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		comment VARCHAR(512) NOT NULL,
		user VARCHAR(40) NOT NULL,
		day VARCHAR(9) NOT NULL,
		post_id INT(12),
		good INT(4),
		bad INT(4))";

	$tables = [$table1, $table2];

	foreach($tables as $sql){
	    $query = $conn->query($sql);
	}
}

$conn -> close();

