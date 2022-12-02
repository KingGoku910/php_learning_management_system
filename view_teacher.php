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

    $sql = "SELECT * FROM teachers";
    $result = mysqli_query($conn, $sql);

    if($_GET['teacher_id']) {

        $t_id = $_GET['teacher_id'];
        
        $sql2 = "DELETE FROM teachers WHERE id = '$t_id'";

        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            header('location: view_teacher.php');
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
        <h1> View All Teacher Data </h1>
        
        <table border="1px">
            <tr>
                <th class="table_th" >Teacher Name</th>
                <th class="table_th" >About Teacher</th>
                <th class="table_th" >Image</th>
                <th class="table_th" >Delete</th>
                <th class="table_th" >Update</th>


            </tr>
            
            <?php
            while($info=$result -> fetch_assoc()) {

            
            ?>

            <tr>
                <td class="table_td" ><?php echo "{$info['name']}" ?></td>
                <td class="table_td" ><?php echo "{$info['description']}" ?></td>
                <td class="table_td" ><img height="150px" width="150px" src="<?php echo "{$info['image']}" ?>" alt="teachers"></td>
                <td class="table_td">
                    <?php
                    echo "
                    <a onClick=\"javascript:return confirm('Do you want to delete this teacher?');\" class='btn btn-danger' href='view_teacher.php?teacher_id={$info['id']}'>
                    
                    Delete
                    
                    </a>";
                    ?>
                </td>
                <td class="table_td">
                <?php
                echo "
                <a class='btn btn-success' href='update_teacher.php?teacher_id={$info['id']}'>Update</a>";
                ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
        
</body>
</html>