<?php

include "../dbconnect.php";
require_once "../main.php";
error_reporting(0);
if($_SESSION['final']){
    header("location: ../");
}

$phone=$_POST['number'];
$pass=mysqli_escape_string($link, $_POST['password']);
$password=md5($pass);

$new=new main($link);
if($new->ifexist("users", "phone='$phone'")){
    if($password==$new->FindColumn("users", "phone='$phone'", "password"))
    {
        $_SESSION['number']=$phone;
        $_SESSION['final']=True;
        echo 1;
    }
    else
     {  echo "Wrong password";}

}
else{echo "No such user";}


?>
