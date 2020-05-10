<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
<TITLE>PHP Shopping </TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Demo Shopping Cart</h1>
<?php 
require "product-gallery.php";
?>
<div class="clear-float"></div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');">Empty Cart</a></div>
<div id="cart-item">
<?php 
require "action.php";
?>
</div>
</div>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
        case "add":
            queryString = 'action=' + action + '&code=' + product_code
                    + '&quantity=' + $("#qty_" + product_code).val();
            break;
        case "remove":
            queryString = 'action=' + action + '&code=' + product_code;
            break;
        case "empty":
            queryString = 'action=' + action;
            break;
        }
    }
    );
}
</script>
</body>
</html>