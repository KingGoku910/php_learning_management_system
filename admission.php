<?php

session_start();

if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='student') {

    header("location: login.php");

}

error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

$sql = "SELECT * FROM admissions";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <?php
    
    include 'admin_css.php';
    include 'add_student.php.php';
    include 'admin_sidebar.php';
    ?>

</head>
<body>
   

    <div class="content">
        <center>
        <h1> Applied for Admission </h1>
            <br>

        <table border="1px" >

            <tr>
                <th style="padding: 10px; font-size: 22px;">Name</th>
                <th style="padding: 10px; font-size: 22px;">Email</th>
                <th style="padding: 10px; font-size: 22px;">Phone</th>
                <th style="padding: 10px; font-size: 22px;">Message</th>

            </tr>

            <?php
            
            while($info=$result->fetch_assoc()) {
                
                
            
            
            ?>

            <tr>
                <td style="padding: 5px; font-size: 16px;"><?php echo " {$info['name']} "; ?></td>
                <td style="padding: 5px; font-size: 16px;"><?php echo " {$info['email']} "; ?></td>
                <td style="padding: 5px; font-size: 16px;"><?php echo " {$info['phone']} "; ?></td>
                <td style="padding: 5px; font-size: 16px;"><?php echo " {$info['message']} "; ?></td>

            </tr>

            <?php 
            }
            ?>

        </table>
        </center>

    </div>
        
</body>
</html>