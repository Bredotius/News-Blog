<?php
session_start();

  require_once 'functions.php';

  echo "<!DOCTYPE html>\n<html><head>";

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
  }
  else $loggedin = FALSE;

echo <<<HEAD
  <meta charset="UTF-8">
  <title>Astro</title>
  <link rel="stylesheet" type="text/css" href="css/page.css">
  <link rel="stylesheet" type="text/css" href="css/mainpage.css">
  <link rel="stylesheet" type="text/css" href="css/logpage.css">
  </head>
  <body>
  <div class="layout">
  </div>
HEAD;

  if ($loggedin)
  {
    echo <<<USERMENU
    <div class="user-menu">
    <div class="user-menu-panel">
    <a href="mylenta.php">
    <span class="user-menu-panel-mylenta">
    Моя лента
    </span></a>
    <a href="tags.php"><span class="user-menu-panel-mylenta">
    Теги
    </span></a>
    <form class="search" action="" method="get">
        <input type="text" name="search" value="Поиск" class="input" >
        <input type="image" src="images/view.png" class="submit">
    </form>
    <ul>
    <li><p class="marginless">Здравствуйте, $user</p></li>
    <a href='logout.php'><li>Выйти</li></a>
    </ul>
    </div>
    </div>
USERMENU;
  }
  else
  {
    echo <<<USERMENU
    <div class="user-menu">
    <div class="user-menu-panel">
    <a href="tags.php">
    <span class="user-menu-panel-mylenta">
    Теги
    </span></a>
    <form class="search" action="news.php" method="get">
        <input type="text" name="search" value="Поиск" class="input" >
        <input type="image" src="images/view.png" class="submit">
    </form>
    <ul>
    <a href="login.php"><li>Войти</li></a>
    <a href="signup.php"><li>Зарегистрироваться</li></a>
    </ul>
    </div>
    </div>
USERMENU;
  }

  echo <<<HEAD
  <div class="menu-panel" id="menu-panel">
  <ul>
  <a href="index.php"><li>Главная</li></a>
  <a href="news.php"><li>Все новости</li></a>
  <a href="about.php"><li>О нас</li></a>
  <a href="help.php"><li>Помощь</li></a>
  </ul>
  </div>
HEAD;
?>
