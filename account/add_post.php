<?php
include "../dbconnect.php";
require_once "../main.php";
if(!$_SESSION['final'] && $_SESSION['number']!=""){
    header("location: ../signup");
}
if(!$_SESSION['final'] || $_SESSION['number']==""){
    header("location: ../");
}
?>

<form action="post.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <input type="text" placeholder="Caption" name="caption" required>

    <h2>Additional</h2>
    <?php
        $new = new main($link);
        $phone = $_SESSION['number'];
        $user_id = $new->FindColumn("users","phone='$phone'", "id");
        $num = $new->count("follow", "following='$user_id'");


    ?>
    <input type="number" name="price" placeholder="price" value=0 <?php if($num<500){echo "disabled"; } ?> required>
    <br>
    <?php if($num<500){
        echo "<i style='color: red'>You will be allowed to upload non free stuff once you reach 500 followers</i>";
    }?>
    <br>

    <input type="text" placeholder="Camera" name="camera">
    <input type="text" placeholder="Lens" name="lens">
    <input type="text" placeholder="Focal" name="focal">
    <input type="text" placeholder="Shutter" name="shutter">
    <input type="text" placeholder="iso" name="iso">
    <input type="submit">
</form>
