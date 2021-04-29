<?php
session_start();
include "../db/con.php";
if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
}
echo "You are Welcome ".$_SESSION['first_name'];
echo '<p>Want to add any course? <a href="../courses/add_course.php"> Add Courses Here </a></p>';
$user_id = $_SESSION['user_id'];
$stmt=$conn->prepare("SELECT * from courses where user_id=$user_id");
$stmt->execute();
$courses=$stmt->fetchAll();
//var_dump($courses);
echo "<H2>My courses</H2>";
if(count($courses)==0){
    echo " you have no course added";
}
for ($i=0; $i < count($courses); $i++) { 
   echo $courses[$i]['course_title'].'---'.$courses[$i]['course_description'].'<br>';
   echo "<form action='../db/dboperations.php' method= 'POST'>    <p><input type='submit' name='delete_course' placeholder='delete course' value='delete'>".'  '."<input type='submit' name='edit_course' placeholder='edit course'value='Edit course'></p>
   <p><input type='hidden' name='course_id' placeholder='delete course' value=".$courses[$i]['course_id']."></p><p><input type='hidden' name='course_title' value='".$courses[$i]['course_title']."'></p><p><input type='hidden' name='course_description'  value='" . $courses[$i]['course_description'] . "'></p></form>";
}

$conn=null;


echo '<p> Want to Logout? <a href="../authentication/logout.php">Logout</a></p>';