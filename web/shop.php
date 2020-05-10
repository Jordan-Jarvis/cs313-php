<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <strong>Choose your model:</strong>

    <?php
    $cars = ["camry", "corolla", "rav4", "tacoma"];
    ?>        
    <form action="" method="post">
        <?php
        if (isset($_POST['Submit'])) {
            $_SESSION['cars'] = $_POST['cars'];
        }
        ?>
        <select name="cars">
            <?php
            foreach ($cars as $car) {
                $selected = "";
                if (isset($_SESSION['cars']) && $_SESSION['cars'] == $car) {
                    $selected = "selected='selected'";
                }
                // select car based on session variable
                echo "<option value='$car' $selected>$car</option>";
            }
            ?>
        </select>