<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("includes/config.php");
include("includes/cart_functions.php");

if(isset($_POST['add_to_cart'])){

$product_id=(int)$_POST['product_id'];
$qty=(int)$_POST['qty'];

if($qty<1){
$qty=1;
}

$check=mysqli_query(
$conn,
"SELECT id FROM products WHERE id=$product_id"
);

if($check && mysqli_num_rows($check)>0){

cart_add($product_id,$qty);

$_SESSION['cart_message']="محصول به سبد خرید اضافه شد 🛍️";

}

}

$referer=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";

header("Location: ".$referer);
exit;

?>
