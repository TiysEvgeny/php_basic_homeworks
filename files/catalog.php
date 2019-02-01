<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="дз4.css">
</head>

<body>
	<div class="gallery">
<?php
$del = (int)$_GET['del'];
if (! empty($del)) {
    $sql = "DELETE FROM gallery WHERE id = $del";
    mysqli_query(connect(), $sql);
    header('Location: ?page=3');
    exit;
}

$title = 'Добавление товара';
$sql = "SELECT id, address, size, name, price) 
        FROM gallery
        ORDER BY id DESC";
$res = mysqli_query(connect(), $sql);
$content = '<a href="?page=2">Добавить</a>';

while($row = mysqli_fetch_assoc($res)){
    $content .= <<<php
    <p>
    Название: {$row['name']} Цена: {$row['price']} руб. 
    | <a href="?page=3&del={$row['id']}">del</a>
    | <a href="?page=4&edit={$row['id']}">edit</a>
    <br>
    </p>

php;
}

$link=mysqli_connect('localhost', 'root', '', 'gbphp');
$sql='SELECT * FROM gallery;';
$res=mysqli_query($link,$sql);
$i=0; //число строк в таблице
define(PAGE_SIZE, 2); //Число картинок на странице
while($row=mysqli_fetch_assoc($res)){
	$address[]=$row['address'];
}
if($_GET['page']!=0){
	for($i=PAGE_SIZE*($_GET['page']-1);$i<PAGE_SIZE*($_GET['page']);$i++){
		$miniFile=preg_replace('/^(\w)(.+).svg/','mini$1$2.png', ucfirst($address[$i]));
		$alt=preg_replace('/.svg/','',$address[$i]);
		echo <<<php
		<a id="$address[$i]" href="images/$address[$i]" target="_blank">
			<img src="images/$miniFile" alt="$alt">
		</a>
php;
	}
}else{
	for($i=0;$i<PAGE_SIZE;$i++){
		$miniFile=preg_replace('/^(\w)(.+).svg/','mini$1$2.png', ucfirst($address[$i]));
		$alt=preg_replace('/.svg/','',$address[$i]);
		echo <<<php
		<a id="$address[$i]" class="imgLink" href="images/$address[$i]" target="_blank">
			<img src="images/$miniFile" alt="$alt">
		</a>
php;
	}
}
$pageCount=(int)(sizeof($address)/PAGE_SIZE); 

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
echo '</div>';
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
			$(".imgLink").click(function(event){
				id=this.attr("id")
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
