<?php
  session_start();
  $_SESSION["loginname"] = $_POST["userid"];
  $_SESSION["pass"] = $_POST["pass"];

  if($_SESSION["loginname"] != "enei" || $_SESSION["pass"] != "pass"){
    ?>
      ログインに失敗しました。<br />
      <a href="login.html">セッション生成ページ</a>
      <?php
      exit;
  }
  if(isset($_POST["userid"])) setcookie("userid", $_POST["userid"], time()+120);
?>
会員専用画面です。<br />
ログイン認証に成功しました。現在ログインしている状態です。<br />
<a href="cookie.php">マイページへ</a>
