<?php
include "../../dbconnect.php";
require_once "../../main.php";
if(!$_SESSION['final'] && $_SESSION['number']!=""){
    header("location: ../../signup");
}
if(!$_SESSION['final'] || $_SESSION['number']=="" || $_GET['id']==""){
    header("location: ../../");
}

$new = new main($link);
$phone = $_SESSION['number'];
$user_id = $new->FindColumn("users","phone='$phone'", "id");
$post_id = $_GET['id'];
$result = $new->ReturnResult("posts", "id=$post_id");
$row = mysqli_fetch_array($result);

?>

<form action="edit.php" method="post">
    <input type="text" placeholder="Caption" name="caption" value="<?php echo $row['caption']; ?>" required>

    <h2>Additional</h2>

    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <input type="text" placeholder="Camera" name="camera" value="<?php echo $row['camera']; ?>">
    <input type="text" placeholder="Lens" name="lens" value="<?php echo $row['lens']; ?>">
    <input type="text" placeholder="Focal" name="focal" value="<?php echo $row['focal']; ?>">
    <input type="text" placeholder="Shutter" name="shutter" value="<?php echo $row['shutter']; ?>">
    <input type="text" placeholder="iso" name="iso" value="<?php echo $row['iso']; ?>">
    <input type="submit">
</form>
