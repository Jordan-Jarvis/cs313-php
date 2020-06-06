 
<?php
session_start();

    require_once 'week05/database.php';
    $db = get_db();
    $title = $_POST["title"];
    $plist = $_POST["plist"]
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Jarvis University</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Jarvis is short for Just A Rather Very Intelligent System.">
<link rel="stylesheet" href="./fonts.css">
<link rel="stylesheet" href="./w3.css">
<link href="./style.css" rel="stylesheet">
</head><body><body style="background-color:#F0F0F0;">

    <div class="top">
        <div class="bar">
            <img class="logo bar-item hidden " src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/07712d52323517.5608d99892165.png" alt="Jarvis Logo">
            <div class="right">
                <a href="./AboutMe.html" class="bar-item button">Home</a>
                <a href="./more.html" class="bar-item button">More about me</a>
                <a href="./Assignments.html" class="bar-item button">Assignments</a>
                <a href="./Random.html" class="bar-item button">Random</a>
            </div>
        </div>
    </div>
<p><br><br><br><br><br></p>
    <!-- Header -->
    <div class="grid-container">
    <form method=post action='insertSong.php'>
        Select the playlist you would like to add to.
        <select id="playlist" name="plist">
        <?php
                    $statement = $db->query('select p.title, l.list from playlist p join songlist l on p.songs = l.list group by p.title, l.list;');
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<option value=' . $row['list'] .'>' . $row['title'] .  '</option>';
                    }
                ?>
            </select>
            Please select the song you would like to add to the playlist.
        <select id="songs" name="slist">
        <?php
                    $statement = $db->query('select s.title, a.album, s.id from song s join album a on s.album = a.id order by a.album ASC;');
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<option value=' . $row['id'] .'>' . $row['title'] . ' - ' . $row['album'] . '</option>';
                    }
                ?>
            </select>
        <input type=submit value='Add Song'>
    </form>
    <form action="removeSong.php">
    <input type="submit" value="Remove a song" />
</form>
        

      <div class="item3">
          
      <p>Song list and album</p>
            <ul>
                <?php
                    $statement = $db->query('select title, a.album from song s join album a on s.album = a.id order by a.album;');
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<li>' . $row['title'] .' - ' . $row['album'] .  '</li>';
                    }
                ?>
                </ul>
      </div>

        <!-- Footer -->
        <!-- from w3 school -->
        <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge item4" style="margin-top:128px">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </footer>
    </div>


</body></html>