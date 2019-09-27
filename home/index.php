<!doctype html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Home</title>

		<link rel="stylesheet" href="../design/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../design/css/style.css">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	</head>
<body style="font-family: 'Quicksand', sans-serif;">


<?php
    include "../dbconnect.php";
    require_once "../main.php";
    error_reporting(0);
    $new = new main($link);
    if($_GET['limit']=="") {
        $limit = 1;
    }
    else{
        $limit =  $_GET['limit'];
    }
    $result = $new->ReturnResult("posts", "1=1 ORDER BY id DESC Limit $limit ");


    ?>
    <button class="btn bt active" style="border-radius: 2px; border:1px solid #0b96cee0; color: #0b96cee0; margin-top: 10px; margin-left: 15px">Latest</button>
    <button class="btn bt" style="border-radius: 2px; border:1px solid #0b96cee0; color: #0b96cee0;  margin-top: 10px">Trending</button>
    <button class="btn bt" style="border-radius: 2px; border:1px solid #0b96cee0; color: #0b96cee0; margin-top: 10px">Following</button>
    <!-- posts -->
    <div id="main" class="container">



    <?php

    while($row = mysqli_fetch_array($result)){
       $post_id = $row['id'];
        ?>

        <div class="crd" style="border-radius: 2px">
          <!-- for images only -->
          <img src="<?php echo $row['image_dir']; ?>" width="100%" onclick="redirect('../post/?id=<?php echo $post_id; ?>')" style="border-radius: 2px 2px 0 0 ">
          <p style="font-size: 14px; padding: 5px 10px; margin: 0" class="text-justify"><?php echo $row['caption']; ?></p>


        <?php
          ?>
          <p style="padding: 2px 10px 10px  ; margin: 0; font-size: 12px">
          <?php
          echo $new->count("likes", "post_id='$post_id'")."  LIKES &#160; &#160;";
          echo $new->count("comments", "post_id='$post_id'")."  COMMENTS";
          ?>
          </p>
          </div>
          <?php

    }
    ?>
    </div>

    <button id="load" class="btn btn-outline-primary" onclick="load('main')" data=<?php echo $limit+1; ?> style="width: 90%; margin-left: 5%; border-radius: 2px;padding: 5px; font-size: 14px">Load more</button>
  </body>

      <script src="../design/js/jquery.min.js"></script>
      <script src="../design/bootstrap/js/bootstrap.min.js"></script>
      <script src="../design/js/script.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
      <script src="../functions.js"></script>
</html>
