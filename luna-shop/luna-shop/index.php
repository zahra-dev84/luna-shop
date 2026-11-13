<?php

$page_title="صفحه اصلی";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

?>

<div class="hero-slider" id="heroSlider">

<div class="hero-slide active" style="background-image:url('images/doll6.jpg');">
<div class="hero-overlay"></div>
<div class="hero-content">
<h2>مجموعه بهاره عروسک‌ها 🌷</h2>
<p>جدیدترین عروسک‌ها با کیفیت عالی و قیمت مناسب</p>
<a href="products.php" class="btn btn-hero">مشاهده محصولات</a>
</div>
</div>

<div class="hero-slide" style="background-image:url('images/doll18.jpg');">
<div class="hero-overlay"></div>
<div class="hero-content">
<h2>عروسک‌های محبوب فروشگاه لونا 🧸</h2>
<p>پرفروش‌ترین‌ها را از دست ندهید</p>
<a href="popular.php" class="btn btn-hero">مشاهده محبوب‌ترین‌ها</a>
</div>
</div>

<div class="hero-slide" style="background-image:url('images/doll28.jpg');">
<div class="hero-overlay"></div>
<div class="hero-content">
<h2>ارسال سریع به سراسر کشور 🚚</h2>
<p>همین حالا خرید خود را شروع کنید</p>
<a href="products.php" class="btn btn-hero">شروع خرید</a>
</div>
</div>

<div class="hero-dots">
<span class="dot active" data-slide="0"></span>
<span class="dot" data-slide="1"></span>
<span class="dot" data-slide="2"></span>
</div>

</div>

<div class="container">

<h2 class="section-title">دسته‌بندی محصولات</h2>

<div class="category-grid">

<a href="products.php?size=کوچک" class="category-card">
<img src="images/doll16.jpg" alt="عروسک های کوچک">
<h3>عروسک‌های کوچک</h3>
</a>

<a href="products.php?size=متوسط" class="category-card">
<img src="images/doll14.jpg" alt="عروسک های متوسط">
<h3>عروسک‌های متوسط</h3>
</a>

<a href="products.php?size=بزرگ" class="category-card">
<img src="images/doll7.jpg" alt="عروسک های بزرگ">
<h3>عروسک‌های بزرگ</h3>
</a>

</div>

</div>

<div class="container">

<h2 class="section-title">محصولات ویژه</h2>

<div class="product-grid">

<?php

$result=mysqli_query(
$conn,
"SELECT * FROM products LIMIT 8"
);

while($row=mysqli_fetch_assoc($result)){

?>

<div class="card">

<div class="card-img-wrap">

<a href="product.php?id=<?php echo $row['id']; ?>">
<img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
</a>

<button class="wishlist-btn" data-id="<?php echo $row['id']; ?>" title="افزودن به علاقه‌مندی‌ها">
<i class="fa-regular fa-heart"></i>
</button>

</div>

<a href="product.php?id=<?php echo $row['id']; ?>" class="card-title-link">
<h3><?php echo $row['name']; ?></h3>
</a>

<p class="price"><?php echo number_format($row['price']); ?> تومان</p>

<form method="post" action="add_to_cart.php" class="add-cart-form">

<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

<input type="number" name="qty" value="1" min="1" class="qty-input">

<button type="submit" name="add_to_cart" class="btn btn-small">افزودن به سبد 🛒</button>

</form>

</div>

<?php
}
?>

</div>

</div>

<div class="trust-section">

<div class="container trust-grid">

<div class="trust-item">
<i class="fa-solid fa-truck-fast"></i>
<h4>ارسال سریع</h4>
<p>ارسال به سراسر کشور طی ۲۴ تا ۴۸ ساعت</p>
</div>

<div class="trust-item">
<i class="fa-solid fa-shield-halved"></i>
<h4>ضمانت اصالت کالا</h4>
<p>تمامی محصولات دارای گارانتی کیفیت هستند</p>
</div>

<div class="trust-item">
<i class="fa-solid fa-headset"></i>
<h4>پشتیبانی آنلاین</h4>
<p>پاسخگویی به سوالات شما در تمام ساعات روز</p>
</div>

<div class="trust-item">
<i class="fa-solid fa-money-bill-wave"></i>
<h4>پرداخت امن</h4>
<p>پرداخت آنلاین یا پرداخت در محل</p>
</div>

</div>

</div>

<div class="container">

<h2 class="section-title">پرفروش‌ترین‌ها 🔥</h2>

<div class="product-grid">

<?php

$result=mysqli_query(
$conn,
"SELECT * FROM products ORDER BY id DESC LIMIT 4"
);

while($row=mysqli_fetch_assoc($result)){

?>

<div class="card">

<div class="card-img-wrap">

<a href="product.php?id=<?php echo $row['id']; ?>">
<img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
</a>

<span class="badge-hot">محبوب</span>

<button class="wishlist-btn" data-id="<?php echo $row['id']; ?>" title="افزودن به علاقه‌مندی‌ها">
<i class="fa-regular fa-heart"></i>
</button>

</div>

<a href="product.php?id=<?php echo $row['id']; ?>" class="card-title-link">
<h3><?php echo $row['name']; ?></h3>
</a>

<p class="price"><?php echo number_format($row['price']); ?> تومان</p>

<form method="post" action="add_to_cart.php" class="add-cart-form">

<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">

<input type="number" name="qty" value="1" min="1" class="qty-input">

<button type="submit" name="add_to_cart" class="btn btn-small">افزودن به سبد 🛒</button>

</form>

</div>

<?php
}
?>

</div>

<div class="section-more">
<a href="popular.php" class="btn btn-outline">مشاهده همه محبوب‌ترین‌ها</a>
</div>

</div>

<div class="newsletter-section">

<div class="container newsletter-box">

<h3>از تخفیف‌های ویژه لونا باخبر شوید 💌</h3>

<p>ایمیل خود را وارد کنید تا از جدیدترین محصولات و تخفیف‌ها مطلع شوید</p>

<form class="newsletter-form" onsubmit="return handleNewsletter(event)">

<input type="email" placeholder="ایمیل شما" required>

<button type="submit" class="btn">عضویت</button>

</form>

</div>

</div>

<?php
include("includes/footer.php");
?>
