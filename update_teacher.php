<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='student') {

    header("location: login.php");

}

$host = "localhost";
$user = "root";
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password,$db_name);

if ($_GET['teacher_id']) {

    $id = $_GET['teacher_id'];

    $sql=" SELECT * FROM teachers WHERE id = '$id' " ;

    $result = mysqli_query($conn, $sql);

    $info=$result->fetch_assoc();
}

if (isset($_POST['update_teacher'])) {
    $t_id =$_POST['id'];
    $t_name = $_POST['name'];
    $t_desc = $_POST['description'];
    $file= $_FILES['image']['name'];

    $dst = "./image/".$file;
    $dst_db = "image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    if ($file) {
        $sql2 = "UPDATE teachers SET name='$t_name', description = '$t_desc', image = '$dst_db' 
    WHERE id = '$t_id' ";
    } else {
        $sql2 = "UPDATE teachers SET name='$t_name', description = '$t_desc'
    WHERE id = '$t_id' ";
    }
    

    $result2=mysqli_query($conn, $sql2);

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
    <title>Update Teacher Dashboard</title>
    <style type="text/css">
        
        label {
            display: inline-block;
            text-align: right;
            width: 200px;
            padding-top: 10px;
            padding-bottom: 10px;
            
        }

        .div_deg {
            
            background-color: gray;
            width: 600px;
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
        <h1> Update Teacher Data </h1>

        <div class="div_deg">

            <form action="#" method="POST" enctype="multipart/form-data" >

                <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>
                <div>
                    <label>Name</label>
                    <input  type="text" name="name" value="<?php echo "{$info['name']}" ?>" >
                </div>

                <div>
                    <label>About Teacher</label>
                    <textarea name="description" cols="22" rows="4"><?php echo "{$info['description']}" ?>
                    </textarea>
                </div>

                <div>
                    <label>Teacher Old Image</label>
                    <img height="150px" width="150px" src="<?php echo "{$info['image']}" ?>" alt="">
                </div>

                <div>
                    <label>Teacher New Image</label><br>
                    <input class="btn btn-secondary" type="file" name="image">
                </div>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" name="update_teacher" value="Update">
                </div>
            </form>

        </div>
        </center>

    </div>
        
</body>
</html>