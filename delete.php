<?php

session_start();

$host = 'localhost';
$user = 'root';
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

if($_GET['student_id']) {
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM user WHERE id = '$user_id' ";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['message']='Student deleted successfully.';
        header("location: view_student.php");
    }
}



?>