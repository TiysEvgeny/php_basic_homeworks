<?php
	echo "<h1>ДЗ2</h1>\n";
	echo "<h2>Пункт 1</h2>\n";
	$a = -2;
	$b = 3;
	if($a>=0 && $b>=0){
		echo $a-$b;
	}else if($a <0 && $b <0){
		echo $a*$b;
	}else{
		echo $a+$b,"\n";
	}
	
	 echo "<h2>Пункт 2</h2>\n";
	$a = 5;
	switch($a){
		case 1:
			echo 1;
		case 2:
			echo 2;
		case 3:
			echo 3;
		case 4:
			echo 4;
		case 5:
			echo 5;
		case 6:
			echo 6;
		case 7:
			echo 7;
		case 8:
			echo 8;
		case 9:
			echo 9;
		case 10:
			echo 10;
		case 11:
			echo 11;
		case 12:
			echo 12;
		case 13:
			echo 13;
		case 14:
			echo 14;
		case 15:
			echo 15;
	}
	echo "\n";
	echo "<h2>Пункт 3</h2>\n";
	$a=10;
	$b=2;
	function sum($a,$b){
		return $a+$b;
	}
	function substract($a,$b){
		return $a-$b;
	}
	function multiply($a,$b){
		return $a*$b;
	}
	function divide($a,$b){
		return $a/$b;
	}
	echo '10+2=', sum($a,$b),"\n";
	echo '10-2=', substract($a,$b),"\n";
	echo '10*2=', multiply($a,$b),"\n";
	echo '10/2=', divide($a,$b),"\n";
	
	echo "<h2>Пункт 4</h2>\n";
	function operate ($a,$b,$operation){
		switch ($operation){
			case '+':
			return sum($a,$b);
			break;
			case '-':
			return substract($a,$b);
			break;
			case '*':
			return multiply($a,$b);
			break;
			case '/':
			return divide($a,$b);
			break;
		}
	}
	echo '10+2=', operate($a,$b,'+'),"\n";
?>