<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['first_name']);
header("Location: index.php");