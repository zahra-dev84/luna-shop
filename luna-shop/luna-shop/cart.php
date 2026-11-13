<?php

$page_title="سبد خرید";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

$items=cart_get_items($conn);
$total=cart_total($conn);

?>

<div class="container">

<div class="breadcrumb">
<a href="index.php">صفحه اصلی</a> / <span>سبد خرید</span>
</div>

<h2 class="page-title">سبد خرید شما</h2>

<?php if(count($items)==0){ ?>

<div class="empty-state">

<p>🛒 سبد خرید شما خالی است.</p>

<a href="products.php" class="btn">مشاهده محصولات</a>

</div>

<?php }else{ ?>

<div class="cart-table-wrap">

<table class="cart-table">

<tr>
<th>محصول</th>
<th>قیمت واحد</th>
<th>تعداد</th>
<th>جمع</th>
<th></th>
</tr>

<?php foreach($items as $item){ ?>

<tr>

<td class="cart-product-cell">

<img src="images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">

<span><?php echo $item['name']; ?></span>

</td>

<td><?php echo number_format($item['price']); ?> تومان</td>

<td>

<form method="post" action="update_cart.php" class="qty-form">

<input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">

<input type="number" name="qty" value="<?php echo $item['qty']; ?>" min="1" class="qty-input">

<button type="submit" name="update_cart" class="btn btn-small">به‌روزرسانی</button>

</form>

</td>

<td class="subtotal-cell"><?php echo number_format($item['subtotal']); ?> تومان</td>

<td>

<a href="remove_from_cart.php?product_id=<?php echo $item['id']; ?>" class="remove-link">
حذف ✕
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<div class="cart-summary">

<h3>مجموع کل: <span><?php echo number_format($total); ?> تومان</span></h3>

<a href="checkout.php" class="btn btn-checkout">ادامه فرآیند خرید ←</a>

</div>

<?php } ?>

</div>

<?php
include("includes/footer.php");
?>
