<?php

session_start();

include("../includes/config.php");

if(isset($_POST['login'])){

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=$_POST['password'];

$sql="SELECT * FROM admins
WHERE username='$username'";

$result=mysqli_query($conn,$sql);

$admin=mysqli_fetch_assoc($result);

if(
$admin &&
password_verify(
$password,
$admin['password']
)
){

$_SESSION['admin']=$username;

header("Location:dashboard.php");

}else{

echo "اطلاعات اشتباه است";

}

}

?>

<!DOCTYPE html>

<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ورود مدیر | عروسک فروشی لونا</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<form method="post" class="auth-form">

<h2>🧸 ورود مدیر</h2>

<input
type="text"
name="username"
placeholder="نام کاربری">

<input
type="password"
name="password"
placeholder="رمز عبور">

<button
name="login"
class="btn">

ورود

</button>

</form>

</div>

</body>

</html>