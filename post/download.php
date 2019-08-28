<?php
include "../dbconnect.php";
require_once "../main.php";

$new = new main($link);
$id = $_GET['id'];
$new->update("posts", "downloads=downloads+1", "id='$id'");
?>
