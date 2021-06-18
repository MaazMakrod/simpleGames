<?php
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

$message = false;
if(isset($_POST['logout'])){
  header("Location: index.php");
  return;
}
elseif(isset($_POST['back'])){
  header("Location: games.php?name=".urlencode($_GET['name']));
  return;
}

$guess = 0;
if(isset($_POST['submit'])){
$guess = $_POST['num'];

  if ( $guess < 65 ) {
    $message = "Your guess is too low";
  } else if ( $guess > 65 ) {
    $message = "Your guess is too high";
  } else {
    $message = "Congratulations - You are right";
  }
}
?>

<html>
<head>
<title>Maaz Makrod - Games</title>
<link href="styling.css" rel="stylesheet">
</head>
<body>
<h1>Guessing Game</h1>

<?php echo("<p> Welcome: " .  htmlentities($_GET['name']). "</p>\n")?>

<form method = "POST">
  <label for="guess">Enter a Guess Between 0 and 100</label>
  <input type = "number" name = "num" id = "guess" min = "0" max = "100" value = "<?= htmlentities($guess) ?>">
  <input type="submit" name="submit" value="Try Guess">
  <input type="submit" name="back" value="Go Back">
  <input type="submit" name="logout" value="Log Out">
</form>

<?php
  if($message !== false){
      echo('<pre>'.htmlentities($message)."</pre><br>");
  }
?>

</body>
</html>
