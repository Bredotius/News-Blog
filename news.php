<?php
require_once 'header.php';
require_once 'functions.php';
?>
<div class="content-wrapper">
<div class="tabs-body">
<div class="news">
<div class="tabs-header">
  Отображать:
  <a href="news.php" class="click">новые</a>
  <a href="news.php?old" class="click">старые</a>
  <a href="news.php?pop" class="click">популярные</a>
</div>
<?php

  if(isset($_GET['search'])){
    $torch = $_GET['search'];
    $query = mysql_query("SELECT * FROM news WHERE title LIKE '%$torch%' OR description LIKE '%$torch%' OR new LIKE '%$torch%'");
    if (!$query) {die('Неверный запрос: ' . mysql_error());}
  }


if(isset($_GET['like']))
{
  $id = $_GET['like'];
  $query = mysql_query("SELECT plus FROM newinfo WHERE newid = '$id'");
  if (!$query) {die('Неверный запрос: ' . mysql_error());}
  $like = mysql_fetch_row($query);
  if($loggedin){$like[0] = $like[0] + 1;}
  else{$like[0] = $like[0] + 0.1;}
  $query = mysql_query("UPDATE newinfo SET plus = '$like[0]' WHERE newid = '$id'");
  if (!$query) {die('Неверный запрос: ' . mysql_error());}
}
if(isset($_GET['dis']))
{
  $id = $_GET['dis'];
  $query = mysql_query("SELECT minus FROM newinfo WHERE newid = '$id'");
  if (!$query) {die('Неверный запрос: ' . mysql_error());}
  $dislike = mysql_fetch_row($query);
  if($loggedin){$dislike[0] = $dislike[0] + 1;}
  else{$dislike[0] = $dislike[0] + 0.1;}
  $query = mysql_query("UPDATE newinfo SET minus = '$dislike[0]' WHERE newid = '$id'");
  if (!$query) {die('Неверный запрос: ' . mysql_error());}
}



if(isset($_GET['tag']))
{
  $tag = $_GET['tag'];
  $sql = "select * from news where tags LIKE '%$tag%'";
  $result = mysql_query($sql, $connect);
}
else if(isset($_GET['old'])){$result = mysql_query('SELECT * FROM news, newinfo WHERE id = newid ORDER BY id ASC');}
else if(isset($_GET['pop'])){$result = mysql_query('SELECT * FROM news, newinfo WHERE id = newid ORDER BY newinfo.view DESC');}
else {$result = mysql_query('SELECT * FROM news, newinfo WHERE id = newid ORDER BY id DESC');}

if(isset($_GET['search'])){
  $torch = $_GET['search'];
  $result = mysql_query("SELECT * FROM news WHERE title LIKE '%$torch%' OR description LIKE '%$torch%' OR new LIKE '%$torch%'");
  if (!$result) {die('Неверный запрос: ' . mysql_error());}
  if (mysql_num_rows($result) == 0){echo '<br>По вашему запросу ничего не найдено :(';}
}

if (!$result) {die('Неверный запрос: ' . mysql_error());}
$news = mysql_num_rows($result);
for($j = 0 ; $j < $news; ++$j)
{
$news = mysql_fetch_row($result);
$img = getImg($news);
$score = $news[8] - $news[9];
if($img == "images/.jpg"){break;}
echo <<<BODY
<article class="news-item" id="news-item-$news[0]">
<header class="news-item-header">
<h2 class="news-item-title">
<a href="content.php?id=$news[0]" class="h1-content-link">$news[1]</a>
</h2>
</header>
<div class="news-item-body">
<figure class="news-item-figure">
<figcaption class="news-item-figcaption">
$news[2]
</figcaption>
<a href="content.php?id=$news[0]" class="figure-content-link">
<img src="$img" alt="" class="figure-content-link-img">
</a>
</figure>
</div>
<footer class="news-item-footer">
<div class="voting">
<div class="chose">
<a href="news.php?dis=$news[0]" class="voting-minus">
<img src="images/dislike.png" alt="" class="footer-img">
</a>
<a href="news.php?like=$news[0]" class="voting-plus">
<img src="images/like.png" alt="" class="footer-img">
</a>
<span class="chose-count-value">$score</span>
</div>
<span class="view-count">
<img src="images/eye.png" alt="" class="footer-img">
<span class="view-count-value">$news[7]</span>
</span>
</div>
</footer>
</article>
BODY;
}
?>

    </div>
  </div>
</div>

</body>
</html>
