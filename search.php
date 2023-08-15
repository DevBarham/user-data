<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'conn.php';
require 'functions.php';
check_login_session();

if (isset($_POST['search'])) {
    // Get the user's submitted name from the form
    $search = $_POST['search'];
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE name LIKE 
    :search OR mobile LIKE :search OR occupation LIKE :search  OR gender LIKE :search  OR address LIKE :search");
    $stmt->execute(['search' =>'%' . $search . '%']);   
} else {
    // Prepare and execute the query to search for users with the given name
    $stmt = $pdo->prepare("SELECT * FROM employees");
    $stmt->execute();
}

// Fetch all matching user records
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Search</h2>
        <form method="POST" action="search.php">
            <input type="text" name="search" placeholder="Search term" required>
            <button type="submit">Search</button>
        </form>

        <h2>Search Results</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Occupation</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td><?= $user['mobile'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['occupation'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
