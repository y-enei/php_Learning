<?php
  session_start();
  $_SESSION["userid"] = $_POST["userid"];
  $_SESSION["pass"] = $_POST["pass"];

  //ユーザIDとパスワードのどちらかがカラではないことをチェック
  if(empty($_SESSION["userid"])){
    ?>
    ユーザIDが入力されていません。<br />
    <a href="login.html">ログインページ</a>
    <?php
    exit;
  }
  if(empty($_SESSION["pass"])){
    ?>
    パスワードが入力されていません。<br />
    <a href="login.html">ログインページ</a>
    <?php
    exit;
  }
  //ユーザIDが半角英数字のみであることをチェック
  if(!(preg_match("/^[a-zA-Z0-9]+$/", $_SESSION["userid"]))){
    ?>
      ユーザIDは半角英数字で入力してください。<br />
      <a href="login.html">ログインページ</a>
      <?php
      exit;
  }
?>

<?php
  //とりあえずuser.jsonの中身は1行しかないこととする
  $json = file_get_contents("user.json");
  if ($json === false) {
    die("file not found");
  }
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $data = json_decode($json, true);

  if($_SESSION["userid"] != $data['id'] || $_SESSION["pass"] != $data['pass']){
    ?>
      ログインに失敗しました。<br />
      <a href="login.html">ログインページ</a>
      <?php
      exit;
  }
  if(isset($_POST["userid"])) setcookie("userid", $_POST["userid"], time()+120);
?>
会員専用画面です。<br />
<a href="cookie.php">マイページへ</a>
