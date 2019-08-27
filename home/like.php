<?php
include "../dbconnect.php";
require_once "../main.php";

$id = $_GET['id'];
$new = new main($link);
$number = $_SESSION['number'];

if($number==""){
    echo "You can't like without login";
}
else{
    $user_id = $new->FindColumn("users", "phone = '$number'", "id");
    if($new->ifexist("likes", "post_id='$id' AND user_id='$user_id'")){
        $new->delete("likes", "post_id='$id' AND user_id='$user_id'");
    }
    else{
        $new->insert("likes", "post_id, user_id", "'$id', '$user_id'");
    }
}


?>
