<?php
// Connect to the PostgreSQL database
$pdo = new PDO("pgsql:host=localhost;port=5432;dbname=jamborow", "postgres", "Barham1975");

// Get the user's submitted information from the form
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];

// Prepare the query to insert the user's information into the database
$stmt = $pdo->prepare("INSERT INTO users (username, password, name, email) VALUES (:username, :password, :name, :email)");
$stmt->execute(['username' => $username, 'password' => $password, 'name' => $name, 'email' => $email]);

// Redirect to the login page after successful registration
header("Location: index.html");
exit();
?>


