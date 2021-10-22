<?php

$height = $weight = $result = $error = "";

if (!empty($_GET)) {
  // echo "We have received some results!\n";
  // echo "Here they are: " . json_encode($_GET);

  $height = $_GET["height"];
  $weight = $_GET["weight"];

  if (empty($height) && empty($weight)) {
    $error = "We didn't receive your height and weight information.";
  } elseif (!empty($height) && empty($weight)) {
    $error = "We didn't receive your weight information.";
  } elseif (empty($height) && !empty($weight)) {
    $error = "We didn't receive your height information.";
  } else {
    // echo "Your height and weight data are received. Thank you.";
    $result = round($weight / ($height * $height), 2);
    //echo "Your BMI is $result";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Static Template</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"> </script>
</head>

<body>
  <h1>Medical Record Form</h1>
  <hr />

  <?php
  echo "Hello this is a PHP comment. \n";
  ?>

  <p>Fill in your name, height and weight for our records.</p>
  <br>
  <form action="" method="GET">
    First Name: <br><input type="text" name="First_name">
    <br>
    Last Name: <br><input type="text" name="Last_name">
    <br>
    Age: <br><input type="number" name="age">
    <br>
    Weight (kg): <br><input type="number" id="weight" step="0.1" name="weight" value="<?php echo $weight ?>">
    <br>
    Height (cm): <br><input type="number" id="height" step="0.1" name="height" value="<?php echo $height ?>"> <!-- displays height -->
    <br>
    <div>
      <label for="comments">Comments</label>
      <br>
      <textarea rows="8" cols="40" id="comments" name="comments" placeholder="Any other comments">
          </textarea>
    </div>
    <input type="submit" id="submit" value="Submit"> <!-- value shows the message in the button -->

    <div id="output">
      <?php
      if (!empty($error)) {
        echo "<strong>Error!</strong><br>";
        echo "<p>$error</p>";
      }

      if (!empty($result)) {
        echo "<p>Your BMI is $result</p>";

        if ($result > 25) {
          echo "You are overweight. \n";
        } elseif ($result < 18.5) {
          echo "You are underweight. \n";
        } else {
          echo "You are healthy. \n";
        }
      }
      ?>

    </div>


    <?php
    include("contact.php");
    ?>

  </form>

</body>

</html>