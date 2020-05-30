<?php
$sid = $_POST['song']; // song id

$sl = $_POST["sl"]; // playlist title

// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.

// echo "book=$book\n";
// echo "chapter=$chapter\n";
// echo "verse=$verse\n";
// echo "content=$content\n";

// we could (and should!) put additional checks here to verify that all this data is actually provided


require_once 'week05/database.php';
$db = get_db();

try
{

	// Add the Scripture

    // We do this by preparing the query with placeholder values
    
	$query = "DELETE From songlist where songlist.list = '$sl' and songlist.songid = '$sid'; ";
	$statement = $db->prepare($query);

	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.

	$statement->execute();

	// get the new id


	// Now go through each topic id in the list from the user's checkboxes

}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: removeSong.php");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>