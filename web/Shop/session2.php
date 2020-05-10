<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<P> Buy some stuff <br><br><br>
Calculator 
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html> 


<!DOCTYPE html>
  
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

       <style>
      .buttons {
        padding: 8px 16px;
        text-decoration: none;
    }
    </style>
   <script src="calc.js"></script>
</head>

<body data="true">

   <form id="form1" onreset="resetFields()">
      <div class="buttons">
         <input name="clearButton" id="clear" type="reset" value="Reset">
         <input name="calculateButton" id="calcuate" type="button" value="Calculate Mileage" onclick="checkFields()">
      </div>
      <div id="errorMessageFirstState">
      </div>
      <div id="errorMessageSecondState">
      </div>
      <div id="content">
      </div>
      <div id="transportationModes">
      </div>
   </form>

</body></html>