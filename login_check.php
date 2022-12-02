<?php

error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

if ($conn === false) {
    die("connectio error");
}

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'];
        $pass = $_POST["password"];

        $sql = "SELECT * FROM user where username='".$name."' AND password='".$pass."' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);


        if ($row["usertype"] == "student") {

            $_SESSION['username']=$name;
            $_SESSION['usertype']='student';

            header("location:studenthome.php");

        } elseif ($row["usertype"] == "admin") {

            $_SESSION['username']=$name;
            $_SESSION['usertype']='admin';

            header("location:adminhome.php");

        } else {
            session_start();

            $message = "Username or password doesn't match.";
            $_SESSION['loginMessage'] = $message;

            header("location: login.php");
        }
    }

?>