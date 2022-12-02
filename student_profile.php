<?php

session_start();

if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='admin') {

    header("location: login.php");

}

$host = 'localhost';
$user = 'root';
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

$name = $_SESSION['username'];

$sql="SELECT * FROM user WHERE username='$name' ";

$result = mysqli_query($conn, $sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])) {

    $student_email=$_POST['email'];
    $student_phone=$_POST['phone'];
    $student_password=$_POST['password'];

    $sql2 = " UPDATE user SET email='$student_email', phone='$student_phone', password='$student_password' WHERE username='$name' ";
    $result2 = mysqli_query($conn, $sql2);

    if($result2) {

        header("location: student_profile.php");
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

    <style type="text/css">

        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .div_deg {
            background-color: gray;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

    </style>

    <?php
    
    include 'student_css.php';
    
    ?>
    
</head>
<body>
    <?php
    
    include 'student_sidebar.php';
    
    ?>

    <div class="content">

    <center>

        <h1> Update Student Profile </h1>
        <br><br>
        
        <form action="#" method="POST">
        <div class="div_deg" >

            <!-- <div>
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo "{$info['username']}" ?>" required>
            </div> -->

            <div>
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo "{$info['email']}" ?>" required>
            </div>

            <div>
                <label for="">Phone</label>
                <input type="number" name="phone" value="<?php echo "{$info['phone']}" ?>" required>
            </div>

            <div>
                <label for="">Password</label>
                <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" required>
            </div>

            <div>
                
                <input class="btn btn-primary" type="submit" name="update_profile" value="Update" >
            </div>
        </div>
        </form>
    </center>
    </div>
        
</body>
</html>