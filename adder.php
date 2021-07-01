<?php
require_once 'functions.php';

$rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ','?');
$lat=array('a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' ','&');

  if (isset($_POST['title']) &&
	isset($_POST['new'])&&
	isset($_POST['description']))
{
  $title   = $_POST['title'];
  $img = str_replace($rus, $lat, $title);
  if (isset($_FILES['image']['name']))
  {
    $saveto = "images/$img.jpg";
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
  }
  $desc = $_POST['description'];
	$new  = $_POST['new'];
  $tags  = $_POST['tags'];
  $date = date("Y-m-d H:i:s");
  $lastid = mysql_insert_id();
  $result = mysql_query("INSERT INTO news VALUES ('', '$title', '$desc', '$new', '$date', '$tags')");
	if (!$result) {die('Неверный запрос: ' . mysql_error());}
  $lastid = mysql_insert_id();
  $result = mysql_query("INSERT INTO newinfo VALUES ('$lastid', '0', '0', '0')");
  if (!$result) {die('Неверный запрос: ' . mysql_error());}
}

echo <<<_END
<meta charset="UTF-8">
<form action="adder.php" method="post" enctype="multipart/form-data"><pre>
Заголовок
<textarea cols="30" rows="1" name="title" maxlength="100">
</textarea>
Теги поиска (', ' для отделения тегов)
<textarea cols="100" rows="1" name="tags" maxlength="100">
</textarea>
Описание новости (основная суть)
<textarea cols="100" rows="5" name="description" maxlength="300">
</textarea>
Новость (PARAPH для отделения обзацев)
<textarea cols="100" rows="10" name="new">
</textarea>
Картинка <input type="file" name="image">
<input type="submit" value="Добавить">
</pre></form>
_END;

?>
