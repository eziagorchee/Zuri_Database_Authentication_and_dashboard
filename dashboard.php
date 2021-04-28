<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}
echo "You are Welcome ".$_SESSION['first_name'];
echo '<p> Want to Logout? <a href="logout.php">Logout</a></p>';