<?php

$num = $_GET["num"];

$c_num = $num/100;
$_c_num = $num%100;

$l_num = $_c_num/50;
$_l_num = $_c_num%50;

$x_num = $_l_num/10; // 2
$_x_num = $_l_num%10; // 7

$v_num = $_x_num/5; // 1
$_v_num = $_x_num%5; // 2

for($i=1;$i<=$c_num;$i++) {
    echo "C";
}

for($i=1;$i<=$l_num;$i++) {
    echo "L";
}

for($i=1;$i<=$x_num;$i++) {
    echo "X";
}

for($i=1;$i<=$v_num;$i++) {
    echo "V";
}

if($_v_num < 4) {
    for($i=1;$i<=$_v_num;$i++) {
        echo "I";
    }
} else {
    echo "IV";
}

?>
