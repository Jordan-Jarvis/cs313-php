

<?php
session_start();
$_SESSION[cart]=array();
array_push($_SESSION[cart],$prod_id);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
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
    <strong>Buy a camera:</strong>

    <?php
    $Dog = ["Poodle", "Pincer", "Foxhound"];
    ?>        
    <form action="" method="post">
        <?php
        if (isset($_POST['Submit'])) {
            $_SESSION['camera'] = $_POST['Dog'];
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

    <strong>
        <?php if (isset($_SESSION['camera'])) {
            echo $_SESSION['camera'];
        }
            ?>
        
    </strong>
</body>