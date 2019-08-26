<?php
function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/jpg')
        $image = imagecreatefromjpg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    else{
        return "only jpg/jpeg/gif/png files are allowed";

    }

    imagejpeg($image, $destination, $quality);

    return $destination;
}

?>
