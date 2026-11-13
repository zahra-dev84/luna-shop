<?php

$page_title="تکمیل خرید";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

$items=cart_get_items($conn);
$total=cart_total($conn);
$error="";

if(count($items)==0){

?>

<div class="container">

<div class="empty-state">
<p>🛒 سبد خرید شما خالی است.</p>
<a href="products.php" class="btn">مشاهده محصولات</a>
</div>

</div>

<?php
include("includes/footer.php");
exit;
}

if(!isset($_SESSION['user'])){

?>

<div class="container">

<div class="empty-state">
<p>برای تکمیل خرید ابتدا باید وارد حساب کاربری خود شوید 🔒</p>
<a href="login.php" class="btn">ورود به حساب کاربری</a>
</div>

</div>

<?php
include("includes/footer.php");
exit;
}

if(isset($_POST['place_order'])){

$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$address=mysqli_real_escape_string($conn,$_POST['address']);

if(empty($fullname) || empty($phone) || empty($address)){

$error="لطفا تمام فیلدها را تکمیل کنید";

}else{

$username=$_SESSION['user'];

$sql="INSERT INTO orders
(username,fullname,phone,address,total_price)
VALUES
('$username','$fullname','$phone','$address',$total)";

mysqli_query($conn,$sql);

$order_id=mysqli_insert_id($conn);

foreach($items as $item){

$pname=mysqli_real_escape_string($conn,$item['name']);

$sql2="INSERT INTO order_items
(order_id,product_id,product_name,price,quantity)
VALUES
($order_id,{$item['id']},'$pname',{$item['price']},{$item['qty']})";

mysqli_query($conn,$sql2);

}

cart_clear();

header("Location: order_success.php?id=".$order_id);
exit;

}

}

?>

<div class="container">

<h2 class="page-title">تکمیل خرید</h2>

<?php if($error){ ?>

<p class="error-message"><?php echo $error; ?></p>

<?php } ?>

<div class="checkout-layout">

<div class="checkout-summary">

<h3>خلاصه سفارش</h3>

<ul>

<?php foreach($items as $item){ ?>

<li>
<span><?php echo $item['name']; ?> × <?php echo $item['qty']; ?></span>
<span><?php echo number_format($item['subtotal']); ?> تومان</span>
</li>

<?php } ?>

</ul>

<p class="total-line">مجموع: <?php echo number_format($total); ?> تومان</p>

</div>

<form method="post" class="checkout-form">

<h3>اطلاعات ارسال</h3>

<input type="text" name="fullname" placeholder="نام و نام خانوادگی" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">

<input type="text" name="phone" placeholder="شماره تماس" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">

<textarea name="address" placeholder="آدرس کامل"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>

<button type="submit" name="place_order" class="btn btn-checkout">ثبت نهایی سفارش</button>

</form>

</div>

</div>

<?php
include("includes/footer.php");
?>
