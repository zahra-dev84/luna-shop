<?php

$page_title="علاقه‌مندی‌ها";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

?>

<div class="container">

<div class="breadcrumb">
<a href="index.php">صفحه اصلی</a> / <span>علاقه‌مندی‌ها</span>
</div>

<h2 class="page-title">علاقه‌مندی‌های من</h2>

<div id="wishlistEmpty" class="empty-state" style="display:none;">
<p>💗 لیست علاقه‌مندی‌های شما خالی است.</p>
<a href="products.php" class="btn">مشاهده محصولات</a>
</div>

<div id="wishlistGrid" class="product-grid"></div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

var list=getWishlist();

if(list.length==0){
document.getElementById("wishlistEmpty").style.display="block";
return;
}

fetch("get_products_json.php?ids="+list.join(","))
.then(function(res){
return res.json();
})
.then(function(products){

var grid=document.getElementById("wishlistGrid");

if(products.length==0){
document.getElementById("wishlistEmpty").style.display="block";
return;
}

products.forEach(function(p){

var card=document.createElement("div");
card.className="card";

card.innerHTML=
'<div class="card-img-wrap">'+
'<a href="product.php?id='+p.id+'"><img src="images/'+p.image+'" alt="'+p.name+'"></a>'+
'<button class="wishlist-btn active" data-id="'+p.id+'" title="حذف از علاقه‌مندی‌ها"><i class="fa-solid fa-heart"></i></button>'+
'</div>'+
'<a href="product.php?id='+p.id+'" class="card-title-link"><h3>'+p.name+'</h3></a>'+
'<p class="price">'+Number(p.price).toLocaleString()+' تومان</p>'+
'<form method="post" action="add_to_cart.php" class="add-cart-form">'+
'<input type="hidden" name="product_id" value="'+p.id+'">'+
'<input type="number" name="qty" value="1" min="1" class="qty-input">'+
'<button type="submit" name="add_to_cart" class="btn btn-small">افزودن به سبد 🛒</button>'+
'</form>';

grid.appendChild(card);

});

attachWishlistButtons();

})
.catch(function(){
document.getElementById("wishlistEmpty").style.display="block";
});

});

</script>

<?php
include("includes/footer.php");
?>
