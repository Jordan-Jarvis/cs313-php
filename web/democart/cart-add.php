<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>




<strong>Buy a camera:</strong>

    <?php
    $camera = ["Digital", "SLR", "DSLR"];
    $prodID = ["11", "12", "13"];
    ?>        
    <form action="" method="post">
        <?php
        if (isset($_POST['Submit'])) {
            $_SESSION['cart'] = $_POST['prodID'];
        }
        ?>
        <select name="camera">
            <?php
            foreach ($camera as $cam) {
                $selected = "";
                if (isset($_SESSION['camera']) && $_SESSION['camera'] == $cam) {
                    $selected = "selected='selected'";
                }
                // select car based on session variable
                echo "<option value='$cam' $selected>$cam</option>";
            }
            ?>
        </select>

        <input type="submit" name="Submit" value="Submit!" />
    </form>





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
