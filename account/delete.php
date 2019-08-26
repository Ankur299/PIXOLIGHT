<?php

include "../dbconnect.php";
include "../main.php";

$post_id = $_GET['id'];
$new = new main($link);



$delete = $new->FindColumn("posts", "id='$post_id'", "image_dir");


if($new->delete("posts", "id=$post_id")){
    echo "DELETED";
    unlink($delete);
}
else{
    echo "Some unknown error occurred";
}
?>
