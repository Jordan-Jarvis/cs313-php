 
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
    <h1>First Playlist Query</h1>

    <?php
        $statement = $db->query('select s.title from playlist p join songlist sl on p.songs = sl.list join song s on sl.songid = s.id where p.title = \'First Playlist\' order by s.title;');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo '<p><b>' . $row['title'] . '</p>';
        }
    ?>
    <h2>Second Playlist Query</h2>
    <?php
        $stmt = $db->prepare('select s.title from playlist p join songlist sl on p.songs = sl.list join song s on sl.songid = s.id where p.title =:name order by s.title;');
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
          echo '<p><b>' . $row['title'] . '</p>';
        }
    ?>
</body>
</html> 

