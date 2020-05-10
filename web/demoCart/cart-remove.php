<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
<title>Session Cart removal on selection by user at plus2net.com</title>
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
$max=sizeof($_SESSION['cart']);
for($i=0; $i<$max; $i++) { 
echo "<input type=checkbox name=item[] value='$i'>";
while (list ($key, $val) = each ($_SESSION['cart'][$i])) { 
echo "   $key -> $val "; 
}
echo "<br>";
}
echo "<input type=submit value=Remove></form>";
require 'menu.php';

?>
</body>
</html>
