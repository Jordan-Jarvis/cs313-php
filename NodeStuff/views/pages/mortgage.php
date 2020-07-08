<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<div>
<?php
session_start()
$_SESSION["quantityCam"] = "Quantity";
$loanInY = $_GET["term"];
$loanAmount = $_GET["amount"];
$costPerMonth = 0;
$interestPerMonth = (($APR / 100) / 12);
$numPayments = $loanInYears * 12;
$costPerMonth = $loanAmount * 
(($interestPerMonth * 
((1 + $interestPerMonth) ** $numPayments)) / 
(((1 + $interestPerMonth) ** $numPayments) - 1));
?>
<table>
      <tr>
         <td>Annual Rate: </td>
         <td><?php echo $_GET["Quantity"] . "%"; ?></td>
      </tr>
      <tr>
         <td>Term: </td>
         <td><?php echo $_GET["term"] . " years"; ?></td>
      </tr>
      <tr>
         <td>Amount: </td>
         <td><?php echo "$" . $_GET["amount"]; ?></td>
      </tr>
      <tr>
         <td>Cost Per Month: </td>
         <td> <?php echo "$" . number_format($costPerMonth, 2, '.', ','); ?></td>
      </tr>
<table>
</div>
</body>
</html>