<?php
require_once 'header.php';
require_once 'functions.php';
?>

  <div class="content-conteiner">
    <div class="content">
      <div class="content-block">
        <a href="tags.php">
          <img class="content-block-img" src="images/astronauta.png" alt="austranaut">
        </a>
        <div class="content-text">
          <h4>Выбрать тег</h4>
        </div>
      </div>
      <div class="content-block">
        <a href="news.php">
          <img class="content-block-img" src="images/space-astronaut.png" alt="austranaut">
        </a>
        <div class="content-text">
          <h4>Все новости</h4>
        </div>
      </div>
<?php
if($loggedin){
  echo<<<LOGED
  <div class="content-block">
    <a href="logout.php">
      <img class="content-block-img" src="images/cosmonaut.png" alt="austranaut">
    </a>
    <div class="content-text">
      <h4>Выйти</h4>
    </div>
  </div>
LOGED;
}
else{
echo<<<SIGNED
      <div class="content-block">
        <a href="login.php">
          <img class="content-block-img" src="images/cosmonaut.png" alt="austranaut">
        </a>
        <div class="content-text">
          <h4>Войти</h4>
        </div>
      </div>
SIGNED;
}
?>
    </div>
  </div>

</body>
</html>
