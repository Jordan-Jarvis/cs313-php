<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Array init</title>
</head>
<body>

<?Php
$_SESSION['cart']=array(); 
array_push($_SESSION['cart'],'Car','Dog','Cat');
array_push($_SESSION['cart'],'Mouse'); 

echo "Number of Items in the cart = ".sizeof($_SESSION['cart']);
require 'menu.php';
?>

</body>

</html>
