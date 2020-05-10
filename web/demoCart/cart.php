<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>

<?Php
//$_SESSION['cart']=array(); // Declaring session array

$_SESSION['cart']=array(array("product"=>"apple","quantity"=>2),
array("product"=>"Orange","quantity"=>4),
array("product"=>"Banana","quantity"=>5),
array("product"=>"Mango","quantity"=>7),
); 
//$_SESSION['cart'][]=$a;

//array_push($_SESSION['cart'],$a); // Items added to cart


echo "Number of Items in the cart = ".sizeof($_SESSION['cart']);
require 'menu.php';
?>

</body>

</html>
