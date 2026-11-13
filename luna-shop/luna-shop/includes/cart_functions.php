<?php

function cart_init(){

if(!isset($_SESSION['cart'])){
$_SESSION['cart']=array();
}

}

function cart_add($product_id,$qty=1){

cart_init();

$product_id=(int)$product_id;
$qty=(int)$qty;

if($qty<1){
$qty=1;
}

if(isset($_SESSION['cart'][$product_id])){
$_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id]+$qty;
}else{
$_SESSION['cart'][$product_id]=$qty;
}

}

function cart_update($product_id,$qty){

cart_init();

$product_id=(int)$product_id;
$qty=(int)$qty;

if($qty<1){
unset($_SESSION['cart'][$product_id]);
}else{
$_SESSION['cart'][$product_id]=$qty;
}

}

function cart_remove($product_id){

cart_init();

$product_id=(int)$product_id;

unset($_SESSION['cart'][$product_id]);

}

function cart_clear(){

$_SESSION['cart']=array();

}

function cart_count(){

cart_init();

$count=0;

foreach($_SESSION['cart'] as $qty){
$count=$count+$qty;
}

return $count;

}

function cart_get_items($conn){

cart_init();

$items=array();

if(count($_SESSION['cart'])==0){
return $items;
}

$ids=array_map('intval',array_keys($_SESSION['cart']));
$ids_str=implode(",",$ids);

$result=mysqli_query(
$conn,
"SELECT * FROM products WHERE id IN ($ids_str)"
);

while($row=mysqli_fetch_assoc($result)){

$qty=$_SESSION['cart'][$row['id']];

$row['qty']=$qty;
$row['subtotal']=$row['price']*$qty;

$items[]=$row;

}

return $items;

}

function cart_total($conn){

$items=cart_get_items($conn);

$total=0;

foreach($items as $item){
$total=$total+$item['subtotal'];
}

return $total;

}

?>
