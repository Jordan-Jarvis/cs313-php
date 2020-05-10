<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>A sorry failed attempt at shopping cart. I spent way too long trying to use PHP or something it was not designed to do. I am so confused and give up on this homework.</title>
</head>
<body>
<form method=post action=''>
Enter a product name, it can be apple Orange bananna or mango<input type=text name=product>
<input type=submit value='Add to Cart'>
</form>
<?Php
@$product=$_POST['product'];

if(strlen($product)>2){

array_push($_SESSION['cart'],$product); // Items added to cart
}
echo "<br>The number of Items in the cart = ".sizeof($_SESSION['cart']);
require 'menu.php';

?>

</body>

</html>
