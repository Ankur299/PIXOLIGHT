<?php
include "../dbconnect.php";
include "../main.php";

if($_SESSION['number']=="")
    echo "Please loin to follow";
else
    $phone = $_SESSION['number'];
    $new = new main($link);
    $user_id = $_GET['id'];
    $my_id = $new->FindColumn("users", "phone = '$phone'", "id");
    if($new->ifexist("follow", "following='$user_id' AND follower = '$my_id'"))
        $new->delete("follow", "following='$user_id' AND follower = '$my_id'");
    else
        $new->insert("follow", "following, follower", "'$user_id', '$my_id'");
?>
