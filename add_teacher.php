<?php

session_start();

if(!isset($_SESSION['username'])) {

    header("location:login.php");

} elseif($_SESSION['usertype']=='student') {

    header("location: login.php");

}

$host = 'localhost';
$user = 'root';
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['name'];
    $t_desc = $_POST['description'];
    $file = $_FILES['image']['name'];

    $dest = "./image/".$file;

    $dest_db = "image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dest);

    $sql= "INSERT INTO teachers (name, description, image) 
    VALUES('$t_name','$t_desc', '$dest_db')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: add_teacher.php");
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
            width: 150px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .div_deg {
            background-color: gray;
            width: 500px;
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
        <h1> Add Teacher </h1>
        <br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name">Teacher Name</label>
                    <input type="text" name="name" >
                </div>
                <br>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="4"></textarea>
                    
                </div>
                <br>
                <div>
                    <label for="image">Image</label>
                    <input class="btn btn-secondary" type="file" name="image" >
                </div>
                <br>
                <div>
                    <input class="btn btn-primary" type="submit" name="add_teacher" value="Add Teacher" >
                </div>
            </form>
        </div>
        </center>
    </div>
        
</body>
</html>