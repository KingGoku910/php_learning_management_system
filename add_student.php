<?php

session_start();

if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='student') {

    header("location: login.php");

}

$host = "localhost";
$user = "root";
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

if(isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $student_email = $_POST['email'];
    $student_phone = $_POST['phone'];
    $student_password = $_POST['password'];
    $usertype = "student";

    $check = "SELECT * FROM user WHERE username='$username' ";
    $check_user = mysqli_query($conn, $check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1) {
        echo "<script type='text/javascript'>
        alert ('Username already exists in the database, try a different username.')
        </script>";
    } else {       
    

        $sql = "INSERT INTO user (username, email, phone, usertype, password)
        VALUES('$username', '$student_email', $student_phone, '$usertype', '$student_password')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script type='text/javascript'>
                alert ('User added successfully.')
            </script>";
        } else {
            echo "<script type='text/javascript'>
                alert ('User add failed.')
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style type="text/css" >

        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .admission_bg {
            background-color: gray;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
        }


    </style>
    
    <?php
    
    include 'admin_css.php';
    include 'admin_sidebar.php';
    

    ?>

</head>
<body>
    
    

    <div class="content">
        <center>
        <h1> Add Student Dashboard </h1>
        <br>
        <div class="admission_bg" >

            <form action="#" method="POST" >
                
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="name" required >
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" required>
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" required>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="text" name="password" required>
                </div>
                <br>
                <div>
                    <input class="btn btn-success" type="submit" name="add_student" value="Add Student">
                </div>
            </form>
        </div>
        </center> 

    </div>
        
</body>
</html>