<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel='stylesheet' type='text/css' href="./css/bootstrap.css">
    <link rel='stylesheet' type='text/css' href="./css/bootstrap.css.map">
</head>
<body class="body_deg" background="./img/home_class_main.jpg">
    
    <center>
        <div class="form_deg">
            <center class="title_deg" >
                Login Form                
            </center>
        
            <form class="login_form" action="login_check.php" method="POST">

                <h5 class="text-danger">
                    <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();

                        echo $_SESSION['loginMessage'];
                    ?>
                </h5>

                <div>
                    <label class="label_deg" for="">Username</label>
                    <input type="text" name="username">
                </div>

                <div>
                    <label class="label_deg" for="">Password</label>
                    <input type="Password" name="password">
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" name="submit" value="Login">
                    <a class="btn btn-primary" href="index.php" >Home</a>
                </div>

                
            </form>
        </div>
    </center>
</body>
</html>