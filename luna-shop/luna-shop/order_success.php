<?php

$page_title="سفارش با موفقیت ثبت شد";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

$id=isset($_GET['id']) ? (int)$_GET['id'] : 0;

?>

<div class="container">

<div class="order-success">

<h2>سفارش شما با موفقیت ثبت شد 🎉</h2>

<p>شماره سفارش شما: <strong>#<?php echo $id; ?></strong></p>

<p>همکاران ما به‌زودی جهت هماهنگی ارسال با شما تماس خواهند گرفت.</p>

<a href="index.php" class="btn">بازگشت به صفحه اصلی</a>

<a href="products.php" class="btn btn-outline">ادامه خرید</a>

</div>

</div>

<?php
include("includes/footer.php");
?>
