<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en-us"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="style.css" rel="stylesheet">
   <title>Mortgage Calculator using php</title>
</head>
<body>
   <form id="phpForm" action="mortgage.php" method="GET">
      <h1> PHP is not designed to hold session data the way you are asking us to do it. This is a session.</h1>
      <div> APR:
      <input type="float" name="apr" id="apr" min="0" max="25"   placeholder="Example: 5"><br>
      Loan Term (number of Years):
      <input type="float" name="term" id="term" min="0"  max="40"  placeholder="Example: 10"><br>
      Loan Amount USD:
      <input type="float" name="amount" id="amount" min="0"  placeholder="Example: 100000"><br>
      <input name="clearButton" id="clear" type="reset" value="Clear">
      <input name="calculateButton" id="calcuate" type="submit" value="Calculate" onclick="calculate(0)">
      <button type="button" onclick="calculate(1)" >Generate Random Values</button>
   </div>
   </form>
</body>
</html>