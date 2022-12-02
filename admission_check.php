<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db_name = "lms_project";

$conn = mysqli_connect($host, $user, $password, $db_name);

if (isset($_POST['apply'])) {

    $adm_name = $_POST['name'];
    $adm_email = $_POST['email'];
    $adm_phone = $_POST['phone'];
    $adm_message = $_POST['message'];

    $sql = "INSERT INTO admissions (name, email, phone,message)
    VALUES ('$adm_name', '$adm_email', '$adm_phone', '$adm_message')";

    $result=mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['message']="Applied successfuly.";

        header("location: index.php");
    } else {
        $_SESSION['message']="Failed to apply.";

        header("location: index.php");
    }

}

// if(isset($_POST['apply'])) {
//     if(empty($adm_name) || empty($adm_email) || empty($adm_email) ))
// }

?>