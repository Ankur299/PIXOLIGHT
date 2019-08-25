
<?php
    include "../dbconnect.php";
    include "../main.php";
    if($_SESSION['number']!=""){
        header("location: final_submission.php");
    }
?>
<form action="register_number.php" method="post">
    <input type="number" name="phone" placeholder="phone number">
    <input type="submit" value="submit">
</form>
