

<?php
echo str_word_count("php,html,designing,android,c++,java");
echo"<br>";
echo strpos("Hello world!", "golu");
echo"<br>";
$str = "python,css,html,data-entry";
$test=explode(",",$str);
//print_r ($test);

for ($i=0; $i <sizeof($test) ; $i++) { 
	# code...
    echo $test[$i]."<br>";
}

echo"------------<br>";
echo stristr("Hello world!","python",true);
$var1="php,html,designing,android,c++,java";
$check="java";
$return=stristr($var1,$check,false);
//$return2=stristr($var1,$check,false);

//echo $return2."<br>";

echo str_word_count($return);

if($return==""){
	echo "string did not match";
}
else{
	echo"String matched";
}

?> 