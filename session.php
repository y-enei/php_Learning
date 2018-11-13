<?php
  session_start();
  $_SESSION["loginname"] = $_POST["userid"];
  $_SESSION["pass"] = $_POST["pass"];

  //ユーザIDとパスワードのどちらかがカラではないことをチェック
  if((!isset($_SESSION["loginname"])) || (!isset($_SESSION["pass"]))){
    ?>
    ユーザIDまたはパスワードが入力されていません。<br />
    <a href="login.html">ログインページ</a>
    <?php
    exit;
  }
?>
<?php
  //ユーザIDが半角英数字のみであることをチェック
  if(!(preg_match("/^[a-zA-Z0-9]+$/", $_SESSION["loginname"])))){
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
    die "file not found";
  }
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $data = json_decode($json, true);

  if($_SESSION["loginname"] != $data['id'] || $_SESSION["pass"] != $data['pass']){
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
