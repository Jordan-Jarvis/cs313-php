

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
    <strong>Buy a camera:</strong>

    <?php
    $camera = ["Digital", "SLR", "DSLR"];
    ?>        
    <form action="" method="post">
        <?php
        if (isset($_POST['Submit'])) {
            $_SESSION['camera'] = $_POST['camera'];
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