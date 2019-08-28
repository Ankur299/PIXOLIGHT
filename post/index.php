<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
include "../dbconnect.php";
require_once "../main.php";

$post_id = $_GET['id'];
if($post_id==""){
    header("location: ../home");
}

$new= new main($link);

if(!$new->ifexist("posts", "id='$post_id'")){
    echo "No such post <a href='../home'>go home</a>";
}

$row = mysqli_fetch_array($new->ReturnResult("posts", "id='$post_id'"));
//post info
print_r($row);


//likes
?>
<div id="l_c">
<?php
echo $new->count("likes", "post_id='$post_id'")."likes";
?>
<button onclick="callajax('like.php','id=<?php echo $row['id']; ?>' ,'#l_c')">Like</button>
</div>


<hr>
<h3>Comments</h3>
<?php
//TODO need to reload


//comments
if(!$new->ifexist("comments", "post_id='$post_id'")){
    echo "<br><b>No comments</b><br>";
}
$result = $new->ReturnResult("comments","post_id='$post_id'");
while($row1 = mysqli_fetch_array($result)){
    print_r($row1);
    echo "<br><br>";
}
?>
<hr>
<form method="post" action="comment.php">
    <input name="post_id" type="hidden" value="<?php echo $post_id; ?>">
    <input type="text" placeholder="Type a comment" name="comment">
    <input type="submit">
</form>

<hr>
<h3>report</h3>
<form method="post" action="report.php">
<input name="post_id" type="hidden" value="<?php echo $post_id; ?>">
<input type="submit" value="report">
</form>

<!-- report -->

<a href="../user?id=<?php echo $row['user_id'] ?>">View profile</a>
<script src="../functions.js"></script>
