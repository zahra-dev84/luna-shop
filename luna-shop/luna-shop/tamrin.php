عداد زوج 1تا 20:
</br>
<?php  
for ($i = 1; $i <= 20; $i++) {
    
    if ($i % 2 == 0) {
    
        echo $i . " "; 
    }
}
?>
<hr>
سوال تعداد ارقام :
</br>
<?php  
$a = 5;
$count = 0;
$a = (int)$a;

while ($a != 0) {
  
    $a = (int)($a / 10);
    $count += 1;
}
echo "تعداد ارقام عدد " . 5 . " برابر است با: " . $count;
?>
<hr>
چاپ ستاره:
</br>
<?php 
for($i=1;$i<=6;$i++){
for($a=1;$a<=$i;$a++){
echo"*";
}
echo "</br>";
}
?>
<hr>
جدول ضرب 5 در 5 :
</br>
<?php
echo "<table border='1' cellpadding='10' cellspacing='0'>";

for ($i = 1; $i <= 5; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 5; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
<hr>
تابع فاکتوریل:
</br>
<?php
function factorial($n) {
    $result = 1;

    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

echo factorial(5); // خروجی: 120
?>
<hr>
 تابع sum 
</br>
مجموع اعداد زوج دو پارامتر:
</br>
<?php
function sumEven($a, $b) {
    $sum = 0;

    // اگر a بزرگتر از b بود جابجا کن
    if ($a > $b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    for ($i = $a; $i <= $b; $i++) {
        if ($i % 2 == 0) {
            $sum += $i;
        }
    }

    return $sum;
}

echo sumEven(1, 10); // خروجی: 30 (2+4+6+8+10)
?>

<!DOCTYPE html>
<html lang="fa">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>عروسک فروشی لونا</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

