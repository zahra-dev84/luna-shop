<?php

include("includes/config.php");

header("Content-Type: application/json; charset=utf-8");

$ids_param=isset($_GET['ids']) ? $_GET['ids'] : '';

$ids=array_filter(array_map('intval',explode(',',$ids_param)));

if(count($ids)==0){
echo json_encode(array());
exit;
}

$ids_str=implode(",",$ids);

$result=mysqli_query(
$conn,
"SELECT id,name,price,image FROM products WHERE id IN ($ids_str)"
);

$products=array();

while($row=mysqli_fetch_assoc($result)){
$products[]=$row;
}

echo json_encode($products,JSON_UNESCAPED_UNICODE);

?>
