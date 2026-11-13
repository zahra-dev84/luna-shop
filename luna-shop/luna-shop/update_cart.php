<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("includes/cart_functions.php");

if(isset($_POST['update_cart'])){

cart_update($_POST['product_id'],$_POST['qty']);

}

header("Location: cart.php");
exit;

?>
