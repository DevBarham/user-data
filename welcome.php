<?php 
session_start();
require('functions.php');
check_login_session();

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome! <?= $user['name'] ?></h2>
        <p><a href="create-user-data.php">Create User</a></p>
        <p><a href="search.php">Search User Data</a></p>
    </div>
</body>
</html>
