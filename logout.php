<?php // Example 26-12: logout.php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<div class='login'>Вы вышли из аккаунта. Пожалуйста " .
         "<a href='index.php' class='click'>нажмите здесь</a> чтобы вернуться на главную.";
  }
?>

    <br><br></div>
  </body>
</html>
