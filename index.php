<?php
echo 'Домашнее задание 3. Тийс Евгений', "\n";
echo 'Пункт 1:',"\n";
$i=0;
while ($i<=100){
	if($i%3==0){
		echo $i,"\t";
	}
	$i++;
}

echo "\n", 'Пункт 2:',"\n";
$i=0;
do{
	echo $i, ' – ';
	if($i==0){
		echo 'это ноль.',"\n";
	}elseif ($i%2==0){
		echo 'чётное число.',"\n";
	}else{
		echo 'нечётное число.',"\n";
	}
	$i++;
}while($i<=10);

echo "\n", 'Пункт 3:',"\n";
$regions =[
	'Московская область' => [
		'Москва',
		'Зеленоград',
		'Клин',
	],
	'Ленинградская область' => [
		'Санкт-Петербург',
		'Всеволожск',
		'Павловск',
		'Кронштадт',
	],
	'Новосибирская область' => [
		'Новосибирск',
		'Бердск',
		'Искитим',
		'Верхний Коён',
	],
	'Красноярский край' => [
		'Красноярск',
		'Кодинск',
		'Богучаны',
		'Карабула',
	],
]; 
var_dump($regions);

echo "\n", 'Пункт 4:',"\n";
$letters = [
	'а' => 'a',
	'б' => 'b',
	'в' => 'v',
	'г' => 'g',
	'д' => 'd',
	'е' => 'ye',
	'ё' => 'yo',
	'ж' => 'zh',
	'з' => 'z',
	'и' => 'i',
	'й' => 'y',
	'к' => 'k',
	'л' => 'l',
	'м' => 'm',
	'н' => 'n',
	'о' => 'o',
	'п' => 'p',
	'р' => 'r',
	'с' => 's',
	'т' => 't',
	'у' => 'u',
	'ф' => 'f',
	'х' => 'h',
	'ц' => 'c',
	'ч' => 'ch',
	'ш' => 'sh',
	'щ' => 'sh\'',
	'ъ' => '\'',
	'ы' => 'i',
	'ь' => '\'',
	'э' => 'e',
	'ю' => 'yu',
	'я' => 'ya'
];

function transliteration ($toTranslit, $transliterationRule){
	foreach ($transliterationRule as $letter => $foreignLetter){
		$toTranslit= str_replace($letter, $foreignLetter, $toTranslit);
	}
	return $toTranslit;
}

echo transliteration('азбука', $letters);

echo "\n", 'Пункт 5:',"\n";
function spaceReplacer ($str){
	return str_replace(' ','_', $str);
}
echo spaceReplacer('В этой строке нет пробелов.');
?>