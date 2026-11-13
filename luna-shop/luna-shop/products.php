<?php

$page_title="محصولات";

include("includes/config.php");
include("includes/header.php");
include("includes/menu.php");

$search=isset($_GET['search']) ? trim($_GET['search']) : '';
$size=isset($_GET['size']) ? trim($_GET['size']) : '';
$sort=isset($_GET['sort']) ? trim($_GET['sort']) : '';

$where=array();

if($search!==''){
$search_safe=mysqli_real_escape_string($conn,$search);
$where[]="name LIKE '%$search_safe%'";
}

if($size!==''){
$size_safe=mysqli_real_escape_string($conn,$size);
$where[]="description LIKE '%$size_safe%'";
}

$sql="SELECT * FROM products";

if(count($where)>0){
$sql.=" WHERE ".implode(" AND ",$where);
}

if($sort=="price_asc"){
$sql.=" ORDER BY price ASC";
}elseif($sort=="price_desc"){
$sql.=" ORDER BY price DESC";
}elseif($sort=="newest"){
$sql.=" ORDER BY id DESC";
}else{
$sql.=" ORDER BY id ASC";
}

$result=mysqli_query($conn,$sql);
$total_count=$result ? mysqli_num_rows($result) : 0;

?>

<div class="container">

<div class="breadcrumb">
<a href="index.php">صفحه اصلی</a> / <span>محصولات</span>
</div>

<h2 class="page-title">محصولات فروشگاه</h2>

<div class="filter-bar">

<form method="get" class="filter-form">

<input type="text" name="search" placeholder="جستجو در محصولات..." value="<?php echo htmlspecialchars($search); ?>">

<select name="size">
<option value="">همه سایزها</option>
<option value="کوچک" <?php echo $size=="کوچک" ? "selected" : ""; ?>>کوچک</option>
<option value="متوسط" <?php echo $size=="متوسط" ? "selected" : ""; ?>>متوسط</option>
<option value="بزرگ" <?php echo $size=="بزرگ" ? "selected" : ""; ?>>بزرگ</option>
</select>

<select name="sort">
<option value="">مرتب‌سازی</option>
<option value="newest" <?php echo $sort=="newest" ? "selected" : ""; ?>>جدیدترین</option>
<option value="price_asc" <?php echo $sort=="price_asc" ? "selected" : ""; ?>>ارزان‌ترین</option>
<option value="price_desc" <?php echo $sort=="price_desc" ? "selected" : ""; ?>>گران‌ترین</option>
</select>

<button type="submit" class="btn btn-small">
<i class="fa-solid fa-filter"></i> اعمال فیلتر
</button>

<?php if($search!=="" || $size!=="" || $sort!==""){ ?>
<a href="products.php" class="btn btn-outline btn-small">حذف فیلتر</a>
<?php } ?>

</form>

</div>

<p class="results-count"><?php echo $total_count; ?> محصول یافت شد</p>

<?php if($total_count==0){ ?>

<div class="empty-state">
<p>😕 محصولی با این مشخصات پیدا نشد.</p>
<a href="products.php" class="btn">مشاهده همه محصولات</a>
</div>

<?php }else{ ?>

<div class="product-grid">

<?php

while(
$row=mysqli_fetch_assoc($result)
){

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

<p class="desc"><?php echo $row['description']; ?></p>

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

<?php
include("includes/footer.php");
?>
