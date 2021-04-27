<?php
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
    } catch (PDOException $e) {
        if($e->getCode() == 23000){
            echo "Error: User already exists";
        }else{
            echo "Error: An error occurred";
        }
        
    }
    $conn = null;
}

// //login user
// if(isset($_POST['login'])and isset($_POST['email']) and isset($_POST['password'])){
//     try{
//         $email=$_POST['email'];
//         $password=$_POST['password'];

//         $stmt = $conn->prepare("SELECT 2 FROM users WHERE email=? and password=?)
// -- VALUES (:first_name, :last_name, :email, :password)");
//         $stmt->execute([$_POST['email']]);
//         $stmt->execute(password_verify($_POST['password'],$user['password']));
// $user = $stmt->fetchAll();
       
    
// } catch{

// }

