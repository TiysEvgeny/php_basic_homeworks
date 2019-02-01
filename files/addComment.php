<?php
$comment = (int)$_GET['comment'];
if (empty($comment)) {
    header('Location: ?page=3');
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO comments (comment, goodId) 
            VALUES ('$comment','$goodid')";
    mysqli_query(connect(), $sql) or die(mysqli_error(connect()));
//    header('Location: '. $_SERVER['REQUEST_URI']);
    header('Location: ?page=3');
    exit;
}

$title = 'Отзывы о товаре';
$content = <<<php
<form method="post">
    <input type="text" name="price" placeholder="Оставьте отзыв">
    <input type="submit">
</form>
php;
