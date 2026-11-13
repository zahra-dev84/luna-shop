<?php

include("../includes/config.php");

$id=$_GET['id'];

$result=mysqli_query(
$conn,
"SELECT * FROM products
WHERE id=$id"
);

$product=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>محصولات</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

</html>
<form method="post" dir="rtl">

<input
type="text"
name="name"
value="<?php echo $product['name']; ?>">

<input
type="number"
name="price"
value="<?php echo $product['price']; ?>">

<input
type="text"
name="image"
value="<?php echo $product['image']; ?>">

<textarea
name="description"><?php echo $product['description']; ?></textarea>

<button
name="update"
class="btn">

ویرایش

</button>

</form>

<?php

if(isset($_POST['update'])){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$price=(int)$_POST['price'];
$image=mysqli_real_escape_string($conn,$_POST['image']);
$description=mysqli_real_escape_string($conn,$_POST['description']);

mysqli_query(

$conn,

"UPDATE products

SET

name='$name',
price='$price',
image='$image',
description='$description'

WHERE id=$id"

);

header(
"Location:dashboard.php"
);

exit;

}

?>