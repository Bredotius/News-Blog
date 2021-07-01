<?php
require_once 'header.php';
require_once 'functions.php';
?>
<div class="content-wrapper">
<div class="tabs-header"></div>
<div class="tabs-body">
<div class="news">

<?php
  $user = $_SESSION['user'];
  $result = mysql_query("SELECT tags FROM users WHERE user = '$user'");
  $tagsrow = mysql_fetch_row($result);
  $tags = explode(", ", $tagsrow[0]);
  $str = "SELECT * from news where ";
  for($i=0; $i<count($tags); $i++){
    $str = ($i<(count($tags)-1)) ? $str.'tags LIKE \'%'.$tags[$i].'%\' OR ' : $str.'tags LIKE \'%'.$tags[$i].'%\'';
  }
$result = mysql_query($str, $connect);
if (!$result) {die('Неверный запрос: ' . mysql_error());}
$news = mysql_num_rows($result);
for($j = $news - 1 ; $j >= 0; --$j)
{
mysql_data_seek($result, $j);
$news = mysql_fetch_row($result);
$img = getImg($news);
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
<a href="" class="voting-minus">
<img src="images/dislike.png" alt="" class="footer-img">
</a>
<a href="" class="voting-plus">
<img src="images/like.png" alt="" class="footer-img">
</a>
</div>
<span class="view-count">
<img src="images/view.png" alt="" class="footer-img">
<span class="view-count-value">1</span>
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
