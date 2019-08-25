<?php

include "../dbconnect.php";
include "../main.php";

if($_SESSION['number']==""){
    header("location: ../signup");
}
if($_SESSION['final']){
    header("location: ../");
}
?>

<form action="submit.php" method="post" enctype="multipart/form-data">

    <input type="file" name="image" id="fileToUpload">
    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="submit" name="submit">

</form>
