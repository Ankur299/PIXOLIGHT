<?php
include "../dbconnect.php";
require_once "../main.php";


$post_id = $_POST['post_id'];
$message = mysqli_escape_string($link, $_POST['comment']);

$new = new main($link);
$number = $_SESSION['number'];

if($number=="" ){
    echo "You can't comment without logging in";
}
else if($message!=""){
    $user_id=$new->FindColumn("users", "phone='$number'", "id");
    if($new->insert("comments", "post_id, user_id, comment", "'$post_id', '$user_id', '$message'")){

    }
    else{
        echo "some error occurred";
    }
}
else{
    echo "message can't be empty";
}
?>
