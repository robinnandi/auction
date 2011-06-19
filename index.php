<html>

<head>
<style>
.errortext {
  font: bold smaller sans-serif;
  color: red;
}
</style>
</head>

<body>
<center>

<br/>
<h1>42 Ifield Road: Room Auction</h1>
<br/>

<?php

include("show_array.php");
include("validate_bid.php");
include("process_bid.php");

$filename = "bids.txt";
$bids = unserialize( file_get_contents($filename) );
show_array($bids);
echo "<br/>";
echo "<br/>";

$errors = array();
if (!empty($_POST['Submit'])) {

  $errors = validate_bid($_POST['name'], $_POST['room'], $_POST['bid']); 

  if (count($errors) == 0) {

    process_bid($_POST['name'], $_POST['room'], $_POST['bid']);

    #Confirmation page

  } else {

    $error_str = "<p>Please check the following and try again:</p>";

  }

echo $error_str;

}

?>

<form method="post" action="<?php echo $PHP_SELF ?>">
<p>
  <label for="name">Name:</label>
  <input name="name" type="text" id="name" value="<?php $_POST['name'] ?>">
  <?php if (!empty($errors['name'])) echo '<br /><span class="errortext">'.$errors['name'].'</span>' ?>
</p>
<p>
  <label for="room">Room:</label>
  <input name="room" type="text" id="room" value="<?php $_POST['room'] ?>">
  <?php if (!empty($errors['room'])) echo '<br /><span class="errortext">'.$errors['room'].'</span>' ?>
</p>
<p>
  <label for="bid">Bid:</label>
  <input name="bid" type="text" id="bid" value="<?php $_POST['bid'] ?>">
  <?php if (!empty($errors['bid'])) echo '<br /><span class="errortext">'.$errors['bid'].'</span>' ?>
</p>
<p>
  <input type="submit" name="Submit" value="Submit">
</p>
</form>

</center>
</body>

</html>

