<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<nav>

<div class="nav-inner">

<button id="menuToggle" class="menu-toggle" aria-label="باز کردن منو">
<i class="fa-solid fa-bars"></i> منو
</button>

<ul id="mainMenu">

<li>
<a href="index.php">
<i class="fa-solid fa-house"></i> صفحه اصلی
</a>
</li>

<li>

<a href="products.php">
<i class="fa-solid fa-gift"></i> محصولات
</a>

<ul>

<li>
<a href="products.php">
همه محصولات
</a>
</li>

<li>
<a href="products.php?size=کوچک">
عروسک‌های کوچک
</a>
</li>

<li>
<a href="products.php?size=متوسط">
عروسک‌های متوسط
</a>
</li>

<li>
<a href="products.php?size=بزرگ">
عروسک‌های بزرگ
</a>
</li>

</ul>

</li>

<li>
<a href="popular.php">
<i class="fa-solid fa-fire"></i> محبوب ترین ها
</a>
</li>

<li>
<a href="wishlist.php">
<i class="fa-regular fa-heart"></i> علاقه‌مندی‌ها
</a>
</li>

<li>
<a href="about.php">
<i class="fa-regular fa-circle-question"></i> درباره ما
</a>
</li>

<li>
<a href="admin/admin_login.php">
<i class="fa-solid fa-user-shield"></i> ورود مدیر
</a>
</li>

<li>

<button
id="themeBtn"
class="btn btn-small">

<i class="fa-solid fa-moon"></i> دارک مود

</button>

</li>

</ul>

</div>

</nav>
