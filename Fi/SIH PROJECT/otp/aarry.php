<?php
$a = rand(1000,9999);
echo  $a;
$age = array("Peter"=>"35", "Ben"=>"$a", "Joe"=>"43");
echo "Ben is " . $age['Ben'] . " years old.";
?>
