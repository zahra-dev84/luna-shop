<?php

$page_title="ورود";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

if(isset($_POST['login'])){

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=$_POST['password'];

$sql="SELECT * FROM users
WHERE username='$username'";

$result=mysqli_query($conn,$sql);

$user=mysqli_fetch_assoc($result);

if(
$user &&
password_verify(
$password,
$user['password']
)
){

$_SESSION['user']=$username;

setcookie(
"user",
$username,
time()+3600
);

header("Location:index.php");

}else{

echo "<h3>نام کاربری یا رمز اشتباه است</h3>";

}

}

?>
<div class="container">

<form method="post" class="auth-form">

<h2>ورود کاربران</h2>

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

<p class="auth-switch">
حساب کاربری ندارید؟ <a href="register.php">ثبت نام کنید</a>
</p>

</form>

</div>

<?php
include("includes/footer.php");
?>