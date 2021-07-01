<?php // Example 26-5: signup.php
  require_once 'header.php';

  echo <<<_END
  <div class='signup'><h3>Введите свою информацию чтобы зарегистрироваться</h3>
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Не все поля заполнены<br><br>";
    else
    {
      $result = mysql_query("SELECT * FROM users WHERE user='$user'");

      if (mysql_num_rows($result))
        {$error = "Это имя уже занято<br><br>";}
      else
      {
        $result = mysql_query("INSERT INTO users VALUES('$user', '$pass','')");
        if (!$result) {die('Неверный запрос: ' . mysql_error());}
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("<h4>Аккаунт зарегистрирован</h4><a href='index.php' class='click'>" .
            "Нажмите здесь</a> чтобы вернуться на главную.<br><br>");
      }
    }
  }

  echo <<<_END
    <form method='post' action='signup.php'>$error
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='16' name='user' value='$user'>
    <span id='info'></span><br>
    <span class='fieldname'>Password</span>
    <input type='text' maxlength='16' name='pass' value='$pass'><br>
_END;
?>

    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Sign up'>
    </form></div><br>
  </body>
</html>
