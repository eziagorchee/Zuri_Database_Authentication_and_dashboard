<?php
session_start();
include("con.php");
//Register user
if (isset($_POST['submit']) and isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST["email"]) and isset($_POST['password'])) {

    // prepare sql and bind parameters
    try {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password)
VALUES (:first_name, :last_name, :email, :password)");
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "New user created successfully";
        header("Location: login.php");
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: User already exists";
        } else {
            echo "Error: An error occurred";
        }
    }
    $conn = null;
}

// //login user
if (isset($_POST['login']) and isset($_POST['email']) and isset($_POST['password'])) {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $user = $stmt->fetch();

        if ($user && md5($_POST['password']) == $user['password']) {
            echo "login successful!";
            $_SESSION['user_id']=$user['user_id'];
            $_SESSION['email']=$user['email'];
            $_SESSION['first_name']=$user['first_name'];
            header("Location: dashboard.php");

        } else {
            echo "invalid login credential";
        }
    } catch (PDOException $e) {
            echo "Error: An error occurred";
    }
    $conn = null;
}
