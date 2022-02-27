<?php 
session_start();
if(isset($_SESSION['email'])){
    header("location: ./index.php");
}
include('./config.php');
$obj = new db();
if(isset($_POST['login'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $obj->StringFillter($_POST['email']);
        $password = $obj->StringFillter($_POST['password']);
        $sqlCat="SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $cat = $obj->getAllProjectList($sqlCat);
        if($cat->num_rows>0){
            $row = $cat->fetch_array();
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
            $_SESSION['name']=$row['name'];
            $_SESSION['role']=$row['role'];
            header("location: ./index.php");
        }else{
            echo '<div class="alerBarClass">
            <strong>Warning!</strong> Wrong Information
            </div>';
        }
    }else{
        echo '<div class="alerBarClass">
        <strong>Warning!</strong> All fileds are Required
        </div>';
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in BSL Admin DashBoard</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body class="LoginBody">
<div class="loginPortion">
    <form class="LoginForm" method="POST" action="./login.php">
        <h1 style="text-align: center;">Login</h1>
        <label>Email</label><br>
        <input type="email" name="email" placeholder="email@gemail.com"><br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="*********">
        <br>
        <input type="submit" name="login" value="Login">

    </form>
</div>
</body>
</html>