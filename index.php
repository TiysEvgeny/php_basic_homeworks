<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <link rel="stylesheet" type="text/css" href="дз4.css">
</head>

<body>
	<div class="gallery">
<?php
$link=mysqli_connect('localhost', 'root', 'root', 'gbphp');
$sql='SELECT * FROM gallery;';
$res=mysql_query($link,$sql);
$i=0; //число строк в таблице
define(PAGE_SIZE, 2); //Число картинок на странице
while($row=mysql_fetch_assoc($res)){
	$i++;
}
$pageCount=(int)($i/PAGE_SIZE); 

$files=scandir("images");
foreach ($files as $file){
	if($file != '..' && $file != '.' && !preg_match('/^mini/', $file)){
		$miniFile=preg_replace('/^(\w)(.+).svg/','mini$1$2.png', ucfirst($file));
		$alt=preg_replace('/.svg/','',$file);
		echo <<<php
		<a id="$file" href="images/$file" target="_blank">
			<img src="images/$miniFile" alt="$alt">
		</a>
php;
	}
}
?>
	</div>
<?php
//пагинация
echo '<div class=pagination>', 'page number: ';
for ($i=1; $i<=$pageCount;$i++){
	echo <<<php
	<a href="index.php?page=$i">$i</a>
php;
}
echo '<\div>';
?>
	<!--
	<form action="">
		Добавление изображения в галерею: 
		<input type="file" name="imgFile" value="">
	</form>-->
	<div id="modalWindow">
	<div id="exitModal">x</div>
		
	</div>
	<div id="shadow"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("a").click(function(event){
				id=$("a").attr("id")
				event.preventDefault();
				$("#shadow").fadeIn(400,
					function(){
						$("#modalWindow") 
							.css("display", "block")
							.animate({opacity: 1, top: "50%"}, 200);
							$img=$("img"); // Создаём элемент img
							$img.attr("src","images/"+id); // Указываем адрес картинки
							$("#modalWindow").append($img); // Прикрепляем img к DOM
					});
			});
			//Закрываем модальное окно
			$("#exitModal, #shadow").click( function(){
				$("#modalWindow").animate({opacity: 0, top: "45%"}, 200,
					function(){
						$(this).css("display", "none");
						$("#shadow").fadeOut(400);
					}
				);
			});
		});
	</script>
</body>

</html>
