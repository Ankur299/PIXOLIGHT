<?php
include "../dbconnect.php";
require_once "../main.php";
require_once "../functions.php";

$phone = $_SESSION['number'];
$new = new main($link);



$destination="../profile/".$_FILES['image']['name'];
if(file_exists($destination)){
    echo "File already exists";
}
else{
    if(compress($_FILES['image']['tmp_name'], $destination, 20)==$destination){
        $delete = $new->FindColumn("users", "phone='$phone'", "profile");
        unlink($delete);
        if($new->update("users", "profile='$destination'", "phone='$phone'")){
            echo "Updated";
        }
        else{
            echo "Some unknown error occured";
        }
    }
    else{
        echo "Problem with uploading image! try a different image";
    }
}

?>
