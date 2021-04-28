<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
}
echo "You are Welcome ".$_SESSION['first_name'];
echo '<p>Want to add any course? <a href="../courses/add_course.php"> Add Courses Here </a></p>';

echo '<p> Want to Logout? <a href="../authentication/logout.php">Logout</a></p>';