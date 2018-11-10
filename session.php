<?php
  session_start();
  $_SESSION["loginname"] = $_POST["userid"];
  $_SESSION["pass"] = $_POST["pass"];

  //ユーザIDとパスワードのどちらかがカラではないことをチェック
  if((!isset($_SESSION["loginname"])) || (!isset($_SESSION["userid"]))){
    ?>
    ユーザIDまたはパスワードが入力されていません。<br />
    <a href="login.html">セッション生成ページ</a>
    <?php
    exit;
  }
?>
<?php
  //ユーザIDが半角英数字のみであることをチェック
  if(!(preg_match("/^[a-zA-Z0-9]+$/", $_SESSION["loginname"])))){
    ?>
      ユーザIDは半角英数字で入力してください。<br />
      <a href="login.html">セッション生成ページ</a>
      <?php
      exit;
  }
?>

<?php
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
