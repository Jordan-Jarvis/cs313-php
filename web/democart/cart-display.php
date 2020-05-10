<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
<title>Displaying Session Cart products from plus2net.com</title>
</head>

<body>
<?Php
if(isset($_SESSION[cart])){
echo "Number of Items in the cart = ".sizeof($_SESSION['cart']);
echo " <br><a href=cart-remove-all.php>Remove all</a><br>";

while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo "$key -> $val <br>"; 
}
}else{
echo " Session Cart is not created. Visit <a href=cart.php>cart.php</a> page to create the array and add products to it. ";
}
require 'menu.php';

?>
</body>
</html>
