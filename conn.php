<?php
$host= 'localhost';
$db = 'jamborow';
$user = 'postgres';
$password = 'Barham1975'; // change to your password

try {
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
	die($e->getMessage());
}