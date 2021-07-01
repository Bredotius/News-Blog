<?php // Example 26-7: login.php
  require_once 'header.php';
  echo "<div class='login'><h3>Введите свою информацию чтобы войти</h3>";
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
        $error = "Не все поля заполнены<br>";
    else
    {
      $result = mysql_query("SELECT user,pass FROM users
        WHERE user='$user' AND pass='$pass'");

      if (mysql_num_rows($result) == 0)
      {
        $error = "<span class='error'>Имя пользователя или пароль
                  введено неверно</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("Вы вошли. <a href='index.php' class='click'>" .
            "Нажмите здесь</a> чтобы вернуться на главную.<br><br>");
      }
    }
  }

  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Имя пользователя  </span><input type='text'
      maxlength='16' name='user' value='$user'><br>
    <span class='fieldname'>Пароль  </span><input type='password'
      maxlength='16' name='pass' value='$pass'>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form><br></div>
  </body>
</html>
