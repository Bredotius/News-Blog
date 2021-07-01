<?php
require_once 'header.php';
require_once 'functions.php';
?>
<div class="content-wrapper">
<div class="tags-body">

<?php

if ($loggedin){
  if (isset($_GET['add']))
  {
    $add = $_GET['add'];
    $user = $_SESSION['user'];
    $result = mysql_query("SELECT tags FROM users WHERE user = '$user'");
    if (!$result) {die('Неверный запрос: ' . mysql_error());}
    $row = mysql_fetch_row($result);
    if($row[0] == null){$str = $row[0].$add;}
    else {$str = $row[0].", ".$add;}
    $result = mysql_query("UPDATE users SET tags = '$str' WHERE user = '$user'");
    if (!$result) {die('Неверный запрос: ' . mysql_error());}
  }
  elseif (isset($_GET['remove']))
  {
    $remove = $_GET['remove'];
    $user = $_SESSION['user'];
    $result = mysql_query("SELECT tags FROM users WHERE user = '$user'");
    $tagsrow = mysql_fetch_row($result);
    $tags = explode(", ", $tagsrow[0]);
    for($i=0; $i<count($tags); $i++){
      if(count($tags) == 1){ $str = null;}
      else if($tags[$i] == $remove){continue;}
      else{
        $str = ($i<(count($tags)-2)) ? $str.$tags[$i].', ' : $str.$tags[$i];
      }
    mysql_query("UPDATE users SET tags = '$str' WHERE user = '$user'");
    if (!$result) {die('Неверный запрос: ' . mysql_error());}
  }
  }

  echo '<p class="tag-title">Мои теги</p><div class="tags">';

  $selecttags = mysql_query("SELECT tags FROM users WHERE user = '$user'");
  $tagsrow = mysql_fetch_row($selecttags);
  $usertags = explode(", ", $tagsrow[0]);
  if((count($usertags)>1) or ($usertags[0] != null)){
  for($i=0; $i<count($usertags); $i++){
echo <<<BODY
<div class="tag">
<span class="tag-span">
<a href="news.php?tag=$usertags[$i]">$usertags[$i]</a>
</span>
<a href="tags.php?remove=$usertags[$i]">
<img src="images/dislike.png" class="addbtn">
</a>
</div>
BODY;
}}
else {echo "Net tegow";}

  echo '</div>';
}

$result = mysql_query('SELECT tags FROM news');

if($loggedin){
  echo '<p class="tag-title">Все теги</p>';
$mytags = mysql_query("SELECT tags FROM users WHERE user = '$user'");
$tagsrow = mysql_fetch_row($mytags);
$usertags = explode(", ", $tagsrow[0]);}

echo '<div class="tags">';

if (!$result) {die('Неверный запрос: ' . mysql_error());}
$news = mysql_num_rows($result);
$notrepeat = array();
for($j = $news - 1 ; $j >= 0; --$j)
{
mysql_data_seek($result, $j);
$news = mysql_fetch_row($result);
$tags = explode(", ", $news[0]);
if(count($tags)>1){
  for($i=0; $i<count($tags); $i++){
    if(($loggedin and in_array($tags[$i],$usertags)) or in_array($tags[$i],$notrepeat)){continue;}
    else if($loggedin){
echo <<<BODY
<div class="tag">
<span class="tag-span">
<a href="news.php?tag=$tags[$i]">$tags[$i]</a>
</span>
<a href="tags.php?add=$tags[$i]">
<img src="images/like.png" class="addbtn">
</a>
</div>
BODY;
}
else {
echo <<<BODY
<div class="tag">
<a href="news.php?tag=$tags[$i]">
<div class="tag-notlog">
<span>
$tags[$i]
</span>
</div>
</a>
</div>
BODY;
}
    $notrepeat[] = $tags[$i];
}
}
else{
  if(($loggedin and in_array($news[0],$usertags)) or in_array($tags[$i],$notrepeat)){continue;}
  else if($loggedin){
  echo <<<BODY
  <div class="tag">
  <span class="tag-span">
  <a href="news.php?tag=$news[0]">$news[0]</a>
  </span>
  <a href="tags.php?add=$news[0]">
  <img src="images/like.png" class="addbtn">
  </a>
  </div>
BODY;
}
else{
  echo <<<BODY
  <div class="tag">
  <a href="news.php?tag=$news[0]">
  <div class="tag-notlog">
  <span>
  $news[0]
  </span>
  </div>
  </a>
  </div>
BODY;
}
  $notrepeat[] = $news[0];
}
}
?>

    </div>
  </div>
</div>

</body>
</html>
