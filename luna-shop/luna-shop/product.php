<?php

include("includes/config.php");

$id=isset($_GET['id']) ? (int)$_GET['id'] : 0;

$result=mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$product=$result ? mysqli_fetch_assoc($result) : null;

$page_title=$product ? $product['name'] : "محصول یافت نشد";

include("includes/header.php");
include("includes/menu.php");

?>

<?php if(!$product){ ?>

<div class="container">

<div class="empty-state">
<p>😕 محصول مورد نظر پیدا نشد.</p>
<a href="products.php" class="btn">بازگشت به محصولات</a>
</div>

</div>

<?php }else{

$size=trim($product['description']);

?>

<div class="container">

<div class="breadcrumb">
<a href="index.php">صفحه اصلی</a> / <a href="products.php">محصولات</a> / <span><?php echo $product['name']; ?></span>
</div>

<div class="product-detail">

<div class="product-gallery">

<img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">

<?php if($size!==""){ ?>
<span class="size-badge">سایز: <?php echo $size; ?></span>
<?php } ?>

</div>

<div class="product-info">

<h1><?php echo $product['name']; ?></h1>

<div class="product-rating">
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-solid fa-star"></i>
<i class="fa-regular fa-star-half-stroke"></i>
<span>(۴.۲ از ۵ بر اساس نظر مشتریان)</span>
</div>

<p class="product-detail-price"><?php echo number_format($product['price']); ?> تومان</p>

<p class="product-detail-desc">
<?php echo $product['name']; ?> یکی از محبوب‌ترین عروسک‌های فروشگاه لوناست؛ با پارچه‌ی نرم و باکیفیت دوخته شده و انتخابی امن و دوست‌داشتنی برای هدیه دادن یا تزیین اتاق کودک است.
</p>

<ul class="product-features">

<li><i class="fa-solid fa-circle-check"></i> جنس نرم، ضدحساسیت و بی‌خطر برای کودکان</li>
<li><i class="fa-solid fa-circle-check"></i> مناسب برای تمام سنین</li>
<li><i class="fa-solid fa-circle-check"></i> قابل شست‌وشو</li>
<li><i class="fa-solid fa-circle-check"></i> دارای ۱۲ ماه گارانتی کیفیت</li>

</ul>

<form method="post" action="add_to_cart.php" class="product-detail-form">

<input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

<div class="qty-stepper">

<button type="button" class="qty-btn qty-minus">−</button>

<input type="number" name="qty" id="detailQty" value="1" min="1" class="qty-input">

<button type="button" class="qty-btn qty-plus">+</button>

</div>

<button type="submit" name="add_to_cart" class="btn btn-checkout">
<i class="fa-solid fa-cart-plus"></i> افزودن به سبد خرید
</button>

<button type="button" class="wishlist-btn wishlist-btn-detail" data-id="<?php echo $product['id']; ?>" title="افزودن به علاقه‌مندی‌ها">
<i class="fa-regular fa-heart"></i>
</button>

</form>

<div class="trust-mini">

<span><i class="fa-solid fa-truck-fast"></i> ارسال سریع</span>
<span><i class="fa-solid fa-rotate-left"></i> ۷ روز ضمانت بازگشت</span>
<span><i class="fa-solid fa-shield-halved"></i> ضمانت اصالت</span>

</div>

</div>

</div>

<?php

$size_safe=mysqli_real_escape_string($conn,$size);

if($size_safe!==""){
$related_sql="SELECT * FROM products WHERE description LIKE '%$size_safe%' AND id!=$id LIMIT 4";
}else{
$related_sql="SELECT * FROM products WHERE id!=$id LIMIT 4";
}

$related_result=mysqli_query($conn,$related_sql);

if($related_result && mysqli_num_rows($related_result)>0){

?>

<h2 class="section-title">محصولات مرتبط</h2>

<div class="product-grid">

<?php

while($row=mysqli_fetch_assoc($related_result)){

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

<?php } ?>

</div>

<script>

(function(){

var minus=document.querySelector(".qty-minus");
var plus=document.querySelector(".qty-plus");
var qtyInput=document.getElementById("detailQty");

if(minus && plus && qtyInput){

minus.onclick=function(){
var v=parseInt(qtyInput.value) || 1;
if(v>1){
qtyInput.value=v-1;
}
}

plus.onclick=function(){
var v=parseInt(qtyInput.value) || 1;
qtyInput.value=v+1;
}

}

})();

</script>

<?php } ?>

<?php
include("includes/footer.php");
?>
