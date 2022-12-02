<?php
//error_reporting(0);
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

$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$info = $result->fetch_assoc();

if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query="UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id' ";
    $result2 = mysqli_query($conn, $query);

    if($result2) {
        header("location: view_student.php");
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Students Page</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: gray;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
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
        <h1> Update Students </h1>
        <br><br>
        
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label for="">Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}";?>" required>
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}";?>" required>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}";?>" required>
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}";?>" required>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
        </div>
        </center>
    </div>
        
</body>
</html>