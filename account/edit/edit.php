<?php

include "../../dbconnect.php";
require_once "../../main.php";

$phone = $_SESSION['number'];
$new = new main($link);

/*
 * default values
 */

$price = 0;
$camera = "N/A";
$lens = "N/A";
$focal = "N/A";
$shutter = "N/A";
$iso = "N/A";

/*
 * posted values
 */

$caption = mysqli_escape_string($link, $_POST['caption']);
$camera = mysqli_escape_string($link, $_POST['camera']);
$lens = mysqli_escape_string($link, $_POST['lens']);
$focal = mysqli_escape_string($link, $_POST['focal']);
$shutter = mysqli_escape_string($link, $_POST['shutter']);
$iso = mysqli_escape_string($link, $_POST['iso']);
$post_id =  $_POST['post_id'];

if($new->update("posts", "caption='$caption', camera='$camera', lens='$lens', focal='$focal', shutter='$shutter', iso='$iso'", "id='$post_id'")){
    echo "Updated";
}
else{
    echo "Some unknown error occurred";
}


?>
