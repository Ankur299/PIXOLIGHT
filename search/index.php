<?php
include "../dbconnect.php";
require_once "../main.php";

$new = new main($link);
$search = mysqli_escape_string($link,$_GET['q']);
if ($_GET["post_limit"]=="")
    $post_limit = 1;
else
    $post_limit = $_GET['post_limit'];

if ($_GET['user_limit'] == "")
    $user_limit = 1;
else
    $user_limit = $_GET['user_limit'];


//users
$result = $new->ReturnResult("users", "name LIKE '%$search%' LIMIT $user_limit");
if(mysqli_num_rows($result)!=0){

?>
<h3>Users</h3>
<div id="users">
<?php

    while ($row = mysqli_fetch_array( $result)){
        print_r($row);
        echo "<hr>";
    }
?>
    <button id="load_user" data="<?php echo $user_limit+1; ?>">load more</button>
</div>
<?php } ?>


<h3>Posts</h3>
<div id="posts">
    <?php
    $result1 = $new->ReturnResult("posts", "caption LIKE '%$search%' OR tags like '%$search%' LIMIT $post_limit");

    if(mysqli_num_rows($result1)==0){
        echo "oops! we can't find a post for you";
    }
    else{
    while ($row1 = mysqli_fetch_array( $result1)){
        print_r($row1);
        echo "<hr>";
    }
    ?>
    <button id="load_post" data="<?php echo $post_limit+1; ?>">load more</button>

    <?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).on('click', '#load_user', function () {
        var data=$(this).attr("data");
        $("#users").load("index.php?q=<?php echo $search; ?>&user_limit="+data+" #users");
    });
    $(document).on('click', '#load_post', function () {
        var data=$(this).attr("data");
        $("#posts").load("index.php?q=<?php echo $search; ?>&post_limit="+data+" #posts");
    });
</script>

