<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
<title>Session Cart removal</title>
</head>

<body>
<?Php
$item=$_POST['item'];
while (list ($key1,$val1) = @each ($item)) {
//echo "$key1 , $val1,<br>";
unset($_SESSION['cart'][$val1]);

}

echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <br>";
echo "<form method=post action=''>";
while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo " <input type=checkbox name=item[] value='$key'>  $key -> $val <br>"; 
}
echo "<input type=submit value=Remove></form>";
require 'menu.php';

?>
</body>
</html>
