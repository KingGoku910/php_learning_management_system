<?php

error_reporting (0);
session_start();
session_destroy();

if($_SESSION['message']) {
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'> 
    
    alert('$message') 
    
    </script>";
}

$host = 'localhost';
$user = 'root';
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

$sql = "SELECT* FROM teachers";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-School Management System</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel='stylesheet' type='text/css' href="./css/bootstrap.css">
    <link rel='stylesheet' type='text/css' href="./css/bootstrap.css.map">
</head>
<body>
    <nav>
        <label class="logo">E-school</label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Admission</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php" class="btn btn-danger" >Login</a></li>

        </ul>
    </nav>

    <div class="section1">
        <label class="img_text"> We teach students to be at top of the pecking order out in the real world... </label>
        <img src="./img/home_class_main.jpg" class="main_img" alt="main_img">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="./img/welcome_img.webp" class="welcome_img" alt="welcome_img">
            </div>
            <div class="col-md-8">

                <h1>Welcome to E-School</h1>
                <p>
                What is meant by E-learning?
                <br>
                <br>
                E-Learning, or electronic learning, is the delivery of learning and training through digital resources.
                Although eLearning is based on formalized learning, it is provided through electronic devices
                 such as computers, tablets and even cellular phones that are connected to the internet.
                 <br>
                 <br>
                 We accomplish success in the form of building the curricuums into a LMS, otherwise known as a Learning Management System.
                </p>
            </div>

            
        </div>
    </div>

    <br>
    <br>

    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">

        <div class="row">
            <?php
            
                while($info=$result -> fetch_assoc()) {
                
            
            
            ?>
            <div class="col-md-4">

                <img src="<?php echo "{$info['image']}" ?>" class="teacher" >
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
            </div>
            <?php
            }
            ?>

                        
        </div>
    </div>
    <br>
    <br>

    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="./img/web_dev.webp" class="courses" alt="course_web">
                <h3 style="padding-top: 20px;">Web Development</h3>
            </div>

            <div class="col-md-4">
                <img src="./img/graphic_design.jpg" class="courses" alt="course_graphic">
                <h3 style="padding-top: 20px;">Graphic Design</h3>
            </div>

            <div class="col-md-4">
                <img src="./img/digital_marketing.jpg" class="courses" alt="course_marketing">
                <h3 style="padding-top: 20px;">Marketing</h3>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <center>
        <h1>Admission Form</h1>
    </center>
    
    <br>

    <div class="admission_form" align="center" >
        <form action="admission_check.php" method="POST">
<!--
            <h3>

            <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();

                        echo $_SESSION['loginMessage'];
                    ?>

            </h3>
-->
            <div class="adm_int">
                <label class="label_text" for="name">Name</label>
                <input class="input_deg" type="text" name="name" placeholder="   Your Name goes here..." required>
            </div>

            <div class="adm_int">
                <label class="label_text" for="email">Email</label>
                <input class="input_deg" type="text" name="email" placeholder="   Your Email goes here..." required>
            </div>

            <div class="adm_int">
                <label class="label_text" for="phone">Phone</label>
                <input class="input_deg" type="text" name="phone" placeholder="   Include international code ie. 27 for South Africa" required>
            </div>

            <div class="adm_int">
                <label class="label_text" for="message">Message</label>
                <textarea class="input_txt" name="message" id="" cols="30" rows="10" placeholder="   Your message goes here..." required></textarea>
            </div>

            <div class="adm_int">
                <input class="btn btn-secondary" type="submit" id="submit" name="apply" value="Apply">
            </div>

        </form>

    </div>

    <footer class="footer_text">
        <h3> All @copyright reserved by Ryno "KingGoku90" Rossouw</h3>
    </footer>

</body>
</html>

