<?php
session_start();
// Connect to the PostgreSQL database
require 'conn.php';
// Get the user's submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the query to check if the username and password match
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$stmt->execute(['username' => $username, 'password' => md5($password)]);

// Fetch the user record
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists and the password is correct
if ($user) {
    $_SESSION['user'] = $user;
    
    // Redirect to the welcome page
    header("Location: welcome.php");
    exit();
} else {
    // Redirect back to the login page with an error message
    header("Location: index.php?error=1");
    exit();
}
?>
