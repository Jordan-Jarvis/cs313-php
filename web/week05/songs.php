 
<?php
session_start();

    require_once 'database.php';
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PGSQL Connect to DB</title>
</head>
<body>
    <h1>Song and album titles.</h1>

    <?php
        $statement = $db->query('select title, a.album from song s join album a on s.album = a.id order by a.album;');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo '<p><b>' . $row['title'] . ' - ' . $row['album'] . '</p>';
        }
    ?>
</body>
</html>
