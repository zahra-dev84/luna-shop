<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

ob_start();

include_once(__DIR__."/cart_functions.php");

?>

<!DOCTYPE html>
<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo isset($page_title) ? $page_title." | عروسک فروشی لونا" : "عروسک فروشی لونا"; ?></title>

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="topbar">

<div class="topbar-inner">

<div class="topbar-contact">

<span><i class="fa-solid fa-phone"></i> ۰۲۱-۱۲۳۴۵۶۷۸</span>

<span class="hide-mobile"><i class="fa-solid fa-envelope"></i> info@lunashop.ir</span>

</div>

<div class="topbar-social">

<a href="#" title="اینستاگرام"><i class="fa-brands fa-instagram"></i></a>
<a href="#" title="تلگرام"><i class="fa-brands fa-telegram"></i></a>
<a href="#" title="واتساپ"><i class="fa-brands fa-whatsapp"></i></a>

</div>

</div>

</div>

<header>

<div class="header-main">

<a href="index.php" class="logo">

🧸 <span>عروسک فروشی لونا</span>

</a>

<form action="products.php" method="get" class="search-form">

<input type="text" name="search" placeholder="جستجوی عروسک مورد نظر..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

<button type="submit" title="جستجو">
<i class="fa-solid fa-magnifying-glass"></i>
</button>

</form>

<div class="header-icons">

<a href="wishlist.php" class="icon-link" title="علاقه‌مندی‌ها">
<i class="fa-regular fa-heart"></i>
<span class="icon-badge" id="wishlistCount">0</span>
</a>

<a href="cart.php" class="icon-link" title="سبد خرید">
<i class="fa-solid fa-cart-shopping"></i>
<?php if(cart_count()>0){ ?>
<span class="icon-badge"><?php echo cart_count(); ?></span>
<?php } ?>
</a>

<a href="<?php echo isset($_SESSION['user']) ? "logout.php" : "login.php"; ?>" class="account-btn" title="<?php echo isset($_SESSION['user']) ? "خروج از حساب ".$_SESSION['user'] : "ورود یا ثبت‌نام"; ?>">
<i class="fa-solid <?php echo isset($_SESSION['user']) ? "fa-arrow-right-from-bracket" : "fa-user"; ?>"></i>
<span><?php echo isset($_SESSION['user']) ? "خروج" : "ورود / ثبت‌نام"; ?></span>
</a>

</div>

</div>

</header>

<?php

if(isset($_SESSION['cart_message'])){

?>

<div class="flash-message">
<?php echo $_SESSION['cart_message']; ?>
</div>

<?php

unset($_SESSION['cart_message']);

}

?>
