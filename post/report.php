<?php
include "../dbconnect.php";
require_once "../main.php";


$post_id = $_POST['post_id'];

$new = new main($link);
    if($new->insert("report", "post_id", "'$post_id'")){
        echo "reported";
    }
    else{
        echo "some error occurred";
    }

?>
