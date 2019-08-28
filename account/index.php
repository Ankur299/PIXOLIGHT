<i>Add upi id and edit profile will have a tab.. and not part of the account</i>


<?php
include "../dbconnect.php";
require_once "../main.php";

if(!$_SESSION['final'] && $_SESSION['number']!=""){
    header("location: ../signup");
}
if(!$_SESSION['final'] || $_SESSION['number']==""){
    header("location: ../home");
}
?>


<h3>My details</h3>
<?php
$new = new main($link);
$phone = $_SESSION['number'];
$result = $new->ReturnResult("users","phone='$phone'");
$row = mysqli_fetch_array($result);
print_r($row);
?>
<br><br>
<img src="<?php echo $row['profile']; ?>" height="200">

<h3>Update profile Picture</h3>
<form action="upload.php" enctype="multipart/form-data" method="post">
    <input type="file" name="image">
    <input type="submit">
</form>



<a href="add_post.php">Add new post</a>

<h3>My Posts</h3>


<?php
$user_id = $new->FindColumn("users", "phone='$phone'", "id");
$result = $new->ReturnResult("posts", "user_id='$user_id'");
while($row = mysqli_fetch_array($result)) {
    print_r($row);
    echo "<br>";
    /*
     * likes and comment count
     */
    $post_id = $row['id'];
    echo $new->count("likes", "post_id='$post_id'")."  likes ";
    echo $new->count("comments", "post_id='$post_id'")."  comments";

    ?>
    <a href="edit?id=<?php echo $post_id; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $post_id; ?>">Delete</a>
    <?php

    echo "<br><br>";

    /*
     * link to the post
     */

}
?>
