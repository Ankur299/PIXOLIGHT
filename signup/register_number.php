<?php

include "../dbconnect.php";
include "../main.php";
$number=$_POST['phone'];

$new = new main($link);

if($new->ifexist("users", "phone=$number")){
    echo "User already exists";
}
else{
    if($new->insert("users", "phone", "$number")){
        $_SESSION['number']=$number;
        $_SESSION['final']=False;
        echo 1;
    }
    else{
        echo "Some unknown error occurred";
    }
}


?>
