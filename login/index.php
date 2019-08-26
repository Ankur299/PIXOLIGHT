<?php
include "../dbconnect.php";
if(!$_SESSION['final'] && $_SESSION[number]!=""){
    header("location: ../signup");
}
if($_SESSION['final']){
    header("location: ../");
}
?>

<h3>Login here</h3>
<form action="login.php" method="post">
    <input type="number" placeholder="phone number" name="number"><br><br>
    <input type="password" placeholder="password" name="password"><br><br>
    <input type="submit" value="login">
</form>
