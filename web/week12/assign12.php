<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Processing</title>
</head>
<body>
    <h1>Confirm Order</h1>
<?php
    $first_name = isset($_GET['first_name']) ? htmlspecialchars($_GET['first_name']) : "";
    $last = isset($_GET['last']) ? htmlspecialchars($_GET['last']) : "";
    $address = isset($_GET['address']) ? htmlspecialchars($_GET['address']) : "";
    $phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : "";
    $total = isset($_GET['total']) ? htmlspecialchars($_GET['total']) : "";
    $card = isset($_GET['card']) ? htmlspecialchars($_GET['card']) : "";
    $credit_card = isset($_GET['credit_card']) ? htmlspecialchars($_GET['credit_card']) : "";
    $exp_date = isset($_GET['exp_date']) ? htmlspecialchars($_GET['exp_date']) : "";

    $items = isset($_GET['items']) ? $_GET['items'] : Array();

    echo "<p>First Name: " . $first_name . "</p>";
    echo "<p>Last Name: " . $last . "</p>";
    echo "<p>Address: " . $address . "</p>";
    echo "<p>Phone Number: " . $phone . "</p>";
    echo "<p>Ordered Items: " . "</p>";
    foreach ($items as $item){
        echo "$item<br>";
    }
    echo "<p>Total Cost: $" . $total . "</p>";
    echo "<p>Credit Card Type: " . $card . "</p>";
    echo "<p>Credit Card Number: " . $credit_card . "</p>";
    echo "<p>Credit Card Expiration Date: " . $exp_date . "</p>";
?>

    <form id="form2" action="assign12_a.php" method="GET">
        Confirm Purchase<input type="submit" id="submit1" value="Submit"><br>
    </form>
    <form id="form3" action="assign12_b.php" method="GET">
        Confirm Purchase<input type="submit" id="submit2" value="Cancel"><br>
    </form>


</body>
</html>




