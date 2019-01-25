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
$files=scandir("images");
foreach ($files as $file){
	if($file != '..' && $file != '.' && !preg_match('/^mini/', $file)){
		$miniFile=preg_replace('/^(\w)(.+).svg/','mini$1$2.png', ucfirst($file));
		$alt=preg_replace('/.svg/','',$file);
		echo		'<a href="images/',$file,'" target="_blank"><img src="images/',$miniFile,'" alt="',$alt,'"></a>';
	}
}
?>
	</div>
	<!--
	<form action="">
		Добавление изображения в галерею: 
		<input type="file" name="imgFile" value="">
    </form>-->
</body>

</html>
