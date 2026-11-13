<?php

session_start();

include("../includes/config.php");

if(isset($_POST['save'])){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$price=(int)$_POST['price'];
$description=mysqli_real_escape_string($conn,$_POST['description']);

$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

$ext=strtolower(
pathinfo(
$image,
PATHINFO_EXTENSION
)
);

if(
$ext=="jpg" ||
$ext=="jpeg" ||
$ext=="png" ||
$ext=="webp"
){

move_uploaded_file(
$tmp,
"../images/".$image
);

$sql="INSERT INTO products
(name,price,image,description)

VALUES

(
'$name',
'$price',
'$image',
'$description'
)";

mysqli_query($conn,$sql);

echo "<h3>محصول ثبت شد</h3>";

}else{

echo "<h3>فرمت عکس مجاز نیست</h3>";

}

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>افزودن محصول</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<form
method="post"
enctype="multipart/form-data">

<h2>افزودن محصول</h2>

<input
type="text"
name="name"
placeholder="نام محصول"
required>

<input
type="number"
name="price"
placeholder="قیمت"
required>

<textarea
name="description"
placeholder="توضیحات"
required></textarea>

<label>

عکس محصول

</label>

<input
type="file"
name="image"
required>

<button
name="save"
class="btn">

ثبت محصول

</button>

</form>

</body>

</html>