<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>
<form method=post action=''>
Enter a product name <input type=text name=product>
<input type=submit value='Add to Cart'>
</form>
<?Php
@$product=$_POST['product'];

if(strlen($product)>3){

array_push($_SESSION['cart'],$product); // Items added to cart
}
echo "<br>Number of Items in the cart = ".sizeof($_SESSION['cart']);
require 'menu.php';

?>

</body>

</html>
