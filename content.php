<?php
require_once 'header.php';
require_once 'functions.php';
$id = $_GET['id'];
$sql = "select * from news where id = $id";
$result = mysql_query($sql, $connect);

$query = mysql_query("SELECT view FROM newinfo WHERE newid = '$id'");
if (!$query) {die('Неверный запрос: ' . mysql_error());}
$views = mysql_fetch_row($query);
$views[0] = $views[0] + 1;
$query = mysql_query("UPDATE newinfo SET view = '$views[0]' WHERE newid = '$id'");
if (!$query) {die('Неверный запрос: ' . mysql_error());}

if ($result){
    $news = mysql_fetch_row($result);
    $title = $news[1];
    $content = $news[3];
    $paragraph = explode("PARAPH", $content);
    $tags = $news[5];
    $img = getImg($news);
    $clrtags = explode(", ", $tags);
    }

echo <<<BODY
      <div class="new-conteiner">
      <header class="new-header">
      <h2 class="new-title">
      $title
      </h2>
      </header>
      <span class="new-tags">Теги:
BODY;
      for($i=0; $i<count($clrtags); $i++)
      {
        echo '<a class="new-tags-link click" href="news.php?tag='.$clrtags[$i].'">'.$clrtags[$i].'</a>';
        if($i<(count($clrtags)-1)){echo ', ';}
      }
      echo <<<BODY
      </span>
      <div class="new-body">
      <img src="$img" alt="" class="new-img">
      <div class="new-description">
BODY;
for($i=0; $i<count($paragraph); $i++){
  echo '<p>'.$paragraph[$i].'</p>';
}
?>
</div>
</div>
</div>
</body>
</html>
