<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'conn.php';
require 'functions.php';
check_login_session();

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];


    $stmt = $pdo->prepare("INSERT INTO employees (name, mobile, address, gender, occupation) VALUES (:name, :mobile, :address, :gender, :occupation)");
    $stmt->execute(['name' => $name, 'mobile' => $mobile,  'address' => $address, 'gender' => $gender,  'occupation' => $occupation]);
    if ($pdo->lastInsertId() > 0) {
        echo "User data created successfully";
    } else {
        echo "Failed to create user data";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create User Data</h2>
        <form method="POST" action="create-user-data.php">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="mobile" placeholder="Mobile" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="gender" placeholder="Gender" required>
            <input type="text" name="occupation" placeholder="Occupation" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
