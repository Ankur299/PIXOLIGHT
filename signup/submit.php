<?php
include "../dbconnect.php";
include "../main.php";
include "../functions.php";
error_reporting(0);
$number=$_SESSION['number'];
$destination="../profile/".$_FILES['image']['name'];
$new=new main($link);

if(file_exists($destination)){
    echo "File already exists";
}
else
    {
        if(compress($_FILES['image']['tmp_name'], $destination, 20)==$destination){
            $name=mysqli_escape_string($link, $_POST['name']);
            $email=mysqli_escape_string($link, $_POST['email']);
            $pass=mysqli_escape_string($link, $_POST['password']);
            $password=md5($pass);
                if($new->update("users", "name='$name', email='$email', password='$password', profile='$destination'", "phone='$number'"))
                {
                    $_SESSION['final']=True;
                    echo 1;
                }
                else{
                    echo "Some error occurred";
                }
        }
        else{
            echo "some error occured! try different image";
            
        }
    }
?>