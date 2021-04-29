<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update COURSE FORM</title>
</head>
<body>
    <div>
    <form action="../db/dboperations.php" method="post">
    <p> Update COURSE</p>
    <?php
    session_start();
    $course_id= $_SESSION['course_id'];
    $course_title= $_SESSION['course_title'];
    $course_description=$_SESSION['course_description'];
    echo $course_description;
   echo "<p><input type='text' name='course_title' placeholder= 'course name' value = '$course_title'></p>";
   echo "<p><input type='textarea' name='course_description' placeholder= 'course description' value = '$course_description'></p>";
   echo "<p><input type='hidden' name='course_id' value = $course_id></p>";?>
    <p><input type="submit" name="update_course" placeholder="update course"></p> 
    </form>
    </div>
</body>
</html>