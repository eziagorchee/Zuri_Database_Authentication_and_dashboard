<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD COURSE FORM</title>
</head>
<body>
    <div>
    <form action="../db/dboperations.php" method="post">
    <p> ADD COURSE</p>
    <p><input type="text" name="course_title" placeholder=" course name"></p>
    <p><input type="textarea" name="course_description" placeholder=" Describe course"></p>
    <p><input type="submit" name="add_course" placeholder="add course"></p>

    <p>View your Courses? <a href="../home/dashboard.php">View Courses</a>
    <p>Want to make any changes? <a href="../home/update_course.php">-Update Courses Here</a>

    </form>

    
    </div>
</body>
</html>