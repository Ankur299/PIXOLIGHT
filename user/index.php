
<?php
include "../dbconnect.php";
require_once "../main.php";

$user_id = $_GET['id'];
if($_GET['id']=="")
    header("location: ../home");

$new = new main($link);
if(!$new->ifexist("users", "id='$user_id'"))
    header("location: ../home");

$row = mysqli_fetch_array($new->ReturnResult("users", "id='$user_id'"));
print_r($row);

echo $new->count("follow", "following='$user_id'")." followers ";

?>
<button onclick="callajax('follow.php', 'id=<?php echo $user_id; ?>')">follow</button>

<h3>POSTS</h3>
<?php
$result = $new->ReturnResult("posts", "user_id='$user_id'");
while ($row1 = mysqli_fetch_array($result)){
    print_r($row1);
    echo "<br><hr>";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../functions.js"></script>
