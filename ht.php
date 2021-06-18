<?php
$message = false;
$checkedH = isset($_POST['choice']) && $_POST['choice'] == 'head' ? 'checked':'';
$checkedT = isset($_POST['choice']) && $_POST['choice'] == 'tail' ? 'checked':'';

// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}
elseif(isset($_POST['back'])){
  header("Location: games.php?name=".urlencode($_GET['name']));
  return;
}

$user = 0;

if(isset($_POST['submit']) && isset($_POST['choice'])){
  $user = $_POST['choice'] == "head" ? 0:1;
  $toss = rand(0,1);

  if ( $user == $toss) {
      $message = "Congratulations - You win!";
  } else {
      $word = $user == 1 ? "heads":"tails";
      $message = "Sorry, the toss was " . $word;
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

<h1>Heads or Tails</h1>
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}

?>
<form method="post">
<input type="radio"  name = "choice" value = "head" <?= $checkedH ?>>Heads</input>
<input type="radio"  name = "choice" value = "tail" <?= $checkedT ?>>Tails</input>
<input type="submit" name = "submit" value="Toss Coin">
<input type="submit" name="back" value="Go Back">
<input type="submit" name="logout" value="Logout">
</form>

<?php
if($message !== false){
  echo("<pre>".$message."</pre>");
}
?>

</body>
</html>
