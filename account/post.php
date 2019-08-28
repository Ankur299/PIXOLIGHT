<?php
include "../dbconnect.php";
require_once "../main.php";
require_once "../functions.php";

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
if($_POST['price']>0) {
    $price = $_POST['price'];
}
$tags = mysqli_escape_string($link, $_POST['tags']);
$camera = mysqli_escape_string($link, $_POST['camera']);
$lens = mysqli_escape_string($link, $_POST['lens']);
$focal = mysqli_escape_string($link, $_POST['focal']);
$shutter = mysqli_escape_string($link, $_POST['shutter']);
$iso = mysqli_escape_string($link, $_POST['iso']);
$user_id = $new->FindColumn("users","phone='$phone'", "id");


$destination = "../images/".$_FILES['image']['name'];
if(file_exists($destination)){
    echo "File already exists";
}
else{
    if(compress($_FILES['image']['tmp_name'], $destination, 20)==$destination) {
        if($new->insert("posts", "user_id, image_dir, price, caption, tags, camera, lens, focal, shutter, iso", "'$user_id', '$destination', '$price', '$caption', '$tags', '$camera', '$lens', '$focal', '$shutter','$iso'" )){
            echo "Uploaded";
        }
        else{
            echo "some error occurred";
        }
    }
    else{
        echo "Problem in uploading the image!! try a different image";
    }
}
?>
