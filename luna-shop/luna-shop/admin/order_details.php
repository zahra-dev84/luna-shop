<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location:admin_login.php");
exit;

}

include("../includes/config.php");

$id=(int)$_GET['id'];

$order_result=mysqli_query(
$conn,
"SELECT * FROM orders WHERE id=$id"
);

$order=mysqli_fetch_assoc($order_result);

$items_result=mysqli_query(
$conn,
"SELECT * FROM order_items WHERE order_id=$id"
);

?>

<!DOCTYPE html>

<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>جزئیات سفارش</title>

<link rel="stylesheet"
href="../css/style.css">

</head>

<body>

<div class="container">

<div class="admin-topbar">

<h1>جزئیات سفارش #<?php echo $id; ?></h1>

<a class="btn" href="orders.php">بازگشت</a>

</div>

<?php if($order){ ?>

<div class="order-info-box">

<p><strong>نام تحویل‌گیرنده:</strong> <?php echo $order['fullname']; ?></p>
<p><strong>تلفن:</strong> <?php echo $order['phone']; ?></p>
<p><strong>آدرس:</strong> <?php echo $order['address']; ?></p>
<p><strong>وضعیت:</strong> <?php echo $order['status']; ?></p>
<p><strong>تاریخ ثبت:</strong> <?php echo $order['created_at']; ?></p>

</div>

<table>

<tr>
<th>محصول</th>
<th>قیمت</th>
<th>تعداد</th>
<th>جمع</th>
</tr>

<?php

while(
$row=mysqli_fetch_assoc($items_result)
){

?>

<tr>

<td><?php echo $row['product_name']; ?></td>
<td><?php echo number_format($row['price']); ?> تومان</td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo number_format($row['price']*$row['quantity']); ?> تومان</td>

</tr>

<?php

}

?>

</table>

<?php }else{ ?>

<p>سفارشی با این کد یافت نشد.</p>

<?php } ?>

</div>

</body>

</html>
