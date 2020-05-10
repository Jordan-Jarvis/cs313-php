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
    <strong>Digital Camera: $134:</strong>

    <?php
    $camera = ["0","1", "2", "3", "4"];
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
      </form>
      <strong>New Puppy: $60:</strong>

    <?php
    $newPup = ["0","1", "2", "3", "4"];
    ?>        
    <form action="" method="post">
        <?php
        if (isset($_POST['Submit'])) {
            $_SESSION['newPup'] = $_POST['newPup'];
        }
        ?>
        <select name="newPup">
            <?php
            foreach ($newPup as $nPup) {
                $selected = "";
                if (isset($_SESSION['newPup']) && $_SESSION['newPup'] == $cam) {
                    $selected = "selected='selected'";
                }
                // select car based on session variable
                echo "<option value='$newPup' $selected>$newPup</option>";
            }
            ?>
        </select>
      </form>
