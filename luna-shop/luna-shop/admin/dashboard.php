<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location:admin_login.php");
exit;

}

include("../includes/config.php");

$result=mysqli_query(
$conn,
"SELECT * FROM products ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>پنل مدیریت</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="admin-topbar">

<h1>پنل مدیریت لونا</h1>

<a class="btn" href="../logout.php">خروج</a>

</div>

<div class="admin-actions">

<a class="btn" href="add_product.php">افزودن محصول</a>

<a class="btn btn-outline" href="orders.php">مشاهده سفارش‌ها</a>

</div>

<h2>لیست محصولات</h2>

<table>

<tr>

<th>کد</th>
<th>نام</th>
<th>قیمت</th>
<th>عکس</th>
<th>ویرایش</th>
<th>حذف</th>

</tr>

<?php

while(
$row=mysqli_fetch_assoc($result)
){

?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo number_format($row['price']); ?> تومان
</td>

<td>

<img
src="../images/<?php echo $row['image']; ?>"
width="80">

</td>

<td>

<a style="text-decoration:none;" class="a" href="edit_product.php?id=<?php echo $row['id']; ?>">

ویرایش

</a>

</td>

<td>

<a style="text-decoration:none; color:rgb(254, 0, 173);" href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟');">

حذف

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>
