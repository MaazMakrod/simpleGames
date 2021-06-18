<?php
$u = isset($_POST['user']) ? $_POST['user']:'';
$p = isset($_POST['psw']) ? $_POST['psw']:'';
$failMessage = false;
$correctP = hash('md5', 'password');

if(isset($_POST['cancel'])){
  header("Location: index.php");
  return;
}
elseif(isset($_POST['submit'])){
      if(isset($_POST['user']) && isset($_POST['psw'])){
        $u = $_POST['user'];
        $p = $_POST['psw'];

        if(strlen($u) < 1 || strlen($p) < 1){
          $failMessage = "Username and Password required";
        }
        else{
            if($correctP == hash('md5',$p)){
              header("Location: games.php?name=".urlencode($_POST['user']));
              return;
            }
            else{
              $failMessage = "Incorrect Password";
            }
        }
      }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Maaz Makrod - Games</title>
<link href="styling.css" rel="stylesheet">
</head>
<body>

<h1>Log In</h1>

<pre>
<?php
if ($failMessage !== false) {
    echo('<p style="color: red;">'.htmlentities($failMessage)."</p>\n");
}
?>
</pre>

<form method = "POST">
  <label for="username">Username: </label>
  <input type="text" name="user" id="username" value = "<?= htmlentities($u) ?>">
  <label for="pass">Password: </label>
  <input type="text" name="psw" id="pass" value = "<?= htmlentities($p) ?>"> <!---password is password-->
  <input type="submit" name="submit" value="Log In">
  <input type="submit" name="cancel" value="Cancel">
</form>

</body>
