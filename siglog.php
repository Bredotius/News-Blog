<?php // Example 26-7: login.php
  require_once 'header.php';
  $error = $user = $pass = "";


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
?>
<div class="siglog-body">
<div class="container" id="container">
<div class="form-container sign-up-container">
<form class="siglog-form" action="#">
  <h1 class="siglog-h1">Создать аккаунт</h1>
  <span class="siglog-span">
<?php
  echo $error;
?>
  </span>
  <input class="siglog-input" type="text"  name='user' placeholder="Login" />
  <input class="siglog-input" type="password"  name='pass' placeholder="Password" />
  <button>Sign Up</button>
</form>
</div>
<div class="form-container sign-in-container">
<form class="siglog-form" action="#">
  <h1 class="siglog-h1">Войти</h1>
  <span class="siglog-span">
    <?php
      echo $error;
    ?>
  </span>
  <input class="siglog-input" type="text" name='user' placeholder="Login" />
  <input class="siglog-input" type="password"  name='pass' placeholder="Password" />
  <button>Sign In</button>
</form>
</div>
<div class="overlay-container">
<div class="overlay">
  <div class="overlay-panel overlay-left">
    <h1 class="siglog-h1">Welcome Back!</h1>
    <p class="siglog-p">To keep connected with us please login with your personal info</p>
    <button class="ghost" id="signIn">Sign In</button>
  </div>
  <div class="overlay-panel overlay-right">
    <h1 class="siglog-h1">Hello, Friend!</h1>
    <p class="siglog-p">Enter your personal details and start journey with us</p>
    <button class="ghost" id="signUp">Sign Up</button>
  </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
container.classList.remove("right-panel-active");
});
</script>

  </body>
</html>
