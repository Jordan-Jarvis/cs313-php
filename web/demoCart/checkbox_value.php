<?php
session_start();
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.

$_SESSION["checklist"] = 'check_list';
$temp = $_SESSION["checklist"];
$checked_count = count($temp);

echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}
?>