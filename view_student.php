<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='student') {

    header("location: login.php");

}

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'lms_project';

$conn = mysqli_connect($host, $user, $password, $db_name);

$sql = "SELECT * FROM user WHERE usertype= 'student'" ;
$result = mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css" >
        .table_th {
            padding: 15px;
            font-size: 22px;
            background-color: black;
            color: white;
        }

        .table_td {
            padding: 15px;
            font-size: 18px;
            background-color: lightgray;
            
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
        <h1> All Student Data </h1>
        <br><br>
        <?php
        
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']);
        
        ?>
        <br><br>


        <table style="border: 1px solid black;" border="1px" >

            <tr>
                <th class="table_th" >Username</th>
                <th class="table_th" >Email</th>
                <th class="table_th" >Phone</th>
                <th class="table_th" >Password</th>
                <th class="table_th" >Delete</th>
                <th class="table_th" >Update</th>


            </tr>

            <?php
            
            while($info=$result->fetch_assoc()) {  
            
            ?> 

            <tr>
                <td class="table_td" ><?php echo " {$info['username']} "; ?></td>
                <td class="table_td" ><?php echo " {$info['email']} "; ?></td>
                <td class="table_td" ><?php echo " {$info['phone']} "; ?></td>
                <td class="table_td" ><?php echo " {$info['password']} "; ?></td>
                <td class="table_td" >
                    <?php echo " <a onClick=\"javascript:return confirm('Are you sure you want to delete this record?'); \" 
                    class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete</a> "; ?>
                </td>
                <td class="table_td" >
                    <?php echo " <a  
                    class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a> "; ?>
                </td>
                <!-- 
                    
                onClick=\"javascript:return confirm('Are you sure you want to delete this record?'); \" -->
            </tr>

            <?php 
            }
            ?>

        </table>
        </center>

    </div>
        
</body>
</html>