<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>




<form action="#" method="post">
<input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label><br/>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}
}
}
?>

<form method=post action=''>
buy bananna <input type=checkbox name=product value="bananna">
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
