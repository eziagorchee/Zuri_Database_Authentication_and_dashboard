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
        header("Location: ../authentication/login.php");
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
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            header("Location: ../home/dashboard.php");
        } else {
            echo "invalid login credential";
        }
    } catch (PDOException $e) {
        echo "Error: An error occurred";
    }
    $conn = null;
}
//validate email
if (isset($_POST['submit_email']) and isset($_POST['email'])) {
    try {
        $email = $_POST['email'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if (isset($user['email'])) {
            $_SESSION['email_reset'] = $user['email'];
            echo 'email ' . $email . ' exists in the database';
            header("Location: ../authentication/pw_form.php");
        } else {
            echo 'email not found';
        }
    } catch (PDOException $e) {
        echo "Error: An error occurred";
    }
    $conn = null;
}
if (isset($_POST['pass_update']) and isset($_POST['enter_password']) and isset($_POST['confirm_password'])) {
    if ($_POST['enter_password'] == $_POST['confirm_password']) {
        try {
            $email = $_SESSION['email_reset'];
            $password = md5($_POST['enter_password']);
            $stmt = $conn->prepare("UPDATE users SET password= '$password' WHERE email= '$email' ");
            //
            $stmt->execute();
            // $user = $stmt->fetchAll();
            echo 'password updated';
            unset($_SESSION['email_reset']);
            header("Location: ../authentication/login.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $conn = null;
    } else {
        echo 'Passwords do not match';
    }
}
// xxxxxxx Course Section  xxxxxxxxxx

// Add courses
if (isset($_POST['add_course']) and isset($_POST['course_title']) and isset($_POST['course_description'])) {
    try {
        $user_id = $_SESSION['user_id'];
        $course_title = $_POST['course_title'];
        $description = $_POST['course_description'];
        $stmt = $conn->prepare("INSERT INTO courses (user_id,course_title,course_description) values(?,?,?)");
        // $stmt->bindParam(':course_name', $course_name);
        // $stmt->bindParam(':description', $description);
        $stmt->execute([$user_id, $course_title, $description]);
        echo "New course created successfully";
        header("Location: ../home/dashboard.php");
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Course already exists";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
    $conn = null;
}

//delete course...

if(isset($_POST['delete_course'])){
    $course_id=$_POST['course_id'];
    $stmt=$conn->prepare("DELETE from courses where course_id=$course_id");
    $stmt->execute();
    header("Location: ../home/dashboard.php");
}
$conn=null;