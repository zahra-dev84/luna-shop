<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("includes/cart_functions.php");

if(isset($_GET['product_id'])){

cart_remove($_GET['product_id']);

$_SESSION['cart_message']="محصول از سبد خرید حذف شد";

}

header("Location: cart.php");
exit;

?>
