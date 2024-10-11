<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$db_host = "localhost";
$db_name = "dbs13342332";
$db_user = "root";
$db_pass = "";

// Opción 1: mysqli
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

// Opción 2: PDO

try {
	$db_con = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db_con;
} catch (PDOException $e) {
	echo $e->getMessage();
}

// Opción 3: Función para conectarse a la BD
function connect()
{
	//$db_host = "127.0.0.1";
	$db_host = "localhost";
	$db_name = "dbs13342332";
	$db_user = "root";
	$db_pass = "";

	return new mysqli($db_host, $db_user, $db_pass, $db_name);
}

// Opción 4
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
