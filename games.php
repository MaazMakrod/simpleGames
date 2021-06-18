<?php
$name = $_GET['name'];
  if(isset($_POST['rsp'])){
    header("Location: rps.php?name=".urlencode($name));
  }
  elseif(isset($_POST['guess'])){
    header("Location: guess.php?name=".urlencode($name));
  }
  elseif(isset($_POST['ht'])){
    header("Location: ht.php?name=".urlencode($name));
  }
  elseif(isset($_POST['logout'])){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Maaz Makrod - Games</title>
<link href="styling.css" rel="stylesheet">
</head>
<body>

<h1>Choose Your Game</h1>

<form method = "POST">
  <input type="submit" name = "rsp" value = "Rock Paper Scissors">
  <input type="submit" name = "guess" value = "Guess a Number">
  <input type="submit" name = "ht" value = "Heads or Tails">
  <input type="submit" name = "logout" value = "Logout">
</form>

</body>
