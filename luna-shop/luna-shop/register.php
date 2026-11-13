<?php

$page_title="ثبت نام";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

if(isset($_POST['register'])){

$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=$_POST['password'];

if(
empty($fullname) ||
empty($email) ||
empty($username) ||
empty($password)
){

echo "تمام فیلدها الزامی هستند";

}else{

$photo=isset($_FILES['photo']) ? $_FILES['photo']['name'] : '';
$tmp=isset($_FILES['photo']) ? $_FILES['photo']['tmp_name'] : '';

$ext=strtolower(
pathinfo(
$photo,
PATHINFO_EXTENSION
)
);

if(
$photo=="" ||
$ext=="jpg" ||
$ext=="jpeg" ||
$ext=="png"
){

if($photo!=""){

move_uploaded_file(
$tmp,
"uploads/".$photo
);

}

$password=password_hash(
$password,
PASSWORD_DEFAULT
);

$photo_safe=mysqli_real_escape_string($conn,$photo);

$sql="INSERT INTO users
(fullname,email,username,password,photo)

VALUES

('$fullname',
'$email',
'$username',
'$password',
'$photo_safe')";

mysqli_query($conn,$sql);

$_SESSION['user']=$username;

setcookie(
"user",
$username,
time()+3600
);

header("Location:index.php");
exit;

}else{

echo "فرمت عکس مجاز نیست";

}

}

}

?>

<div class="container">

<form method="post"
enctype="multipart/form-data"
class="auth-form">

<h2>ثبت نام کاربران</h2>

<input
type="text"
name="fullname"
placeholder="نام و نام خانوادگی">

<input
type="email"
name="email"
placeholder="ایمیل">

<input
type="text"
name="username"
placeholder="نام کاربری">

<input
type="password"
name="password"
placeholder="رمز عبور">

<label>عکس پروفایل</label>

<input
type="file"
name="photo"
accept=".jpg,.jpeg,.png">


<button
name="register"
class="btn">

ثبت نام

</button>

<p class="auth-switch">
قبلا ثبت نام کرده‌اید؟ <a href="login.php">وارد شوید</a>
</p>

</form>

</div>

<?php
include("includes/footer.php");
?>