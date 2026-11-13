<?php

$page_title="محبوب ترین ها";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

?>

<div class="container">

<div class="breadcrumb">
<a href="index.php">صفحه اصلی</a> / <span>محبوب ترین ها</span>
</div>

<h2 class="page-title">محبوب ترین عروسک ها</h2>

<div class="product-grid">

<?php

$result=mysqli_query(
$conn,
"SELECT * FROM products
ORDER BY id DESC
LIMIT 8"
);

while(
$row=mysqli_fetch_assoc($result)
){

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

</div>

<?php
include("includes/footer.php");
?>
