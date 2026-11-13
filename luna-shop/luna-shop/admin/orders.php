<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location:admin_login.php");
exit;

}

include("../includes/config.php");

$result=mysqli_query(
$conn,
"SELECT * FROM orders ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>سفارش‌ها</title>

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

<a class="btn" href="dashboard.php">مدیریت محصولات</a>

</div>

<h2>لیست سفارش‌ها</h2>

<table>

<tr>

<th>کد</th>
<th>کاربر</th>
<th>نام تحویل‌گیرنده</th>
<th>تلفن</th>
<th>مبلغ کل</th>
<th>وضعیت</th>
<th>تاریخ</th>
<th>جزئیات</th>

</tr>

<?php

if(mysqli_num_rows($result)==0){

?>

<tr>
<td colspan="8">هنوز سفارشی ثبت نشده است.</td>
</tr>

<?php

}

while(
$row=mysqli_fetch_assoc($result)
){

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo number_format($row['total_price']); ?> تومان</td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['created_at']; ?></td>

<td>

<a class="a" href="order_details.php?id=<?php echo $row['id']; ?>">
مشاهده
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
