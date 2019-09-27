<!doctype html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Account</title>

		<link rel="stylesheet" href="../design/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../design/css/style.css">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	</head>
<body style="font-family: 'Quicksand', sans-serif;">

      <?php
      include "../dbconnect.php";
      require_once "../main.php";

      if(!$_SESSION['final'] && $_SESSION['number']!=""){
          header("location: ../signup");
      }
      if(!$_SESSION['final'] || $_SESSION['number']==""){
          header("location: ../home");
      }
      ?>


      <?php
      $new = new main($link);
      $phone = $_SESSION['number'];
      $result = $new->ReturnResult("users","phone='$phone'");
      $row = mysqli_fetch_array($result);
      //print_r($row);
      ?>

      <!-- Profile area -->
      <div class="container" style="padding-top:15px">
        <div class="w-100">
          <div class="col-4" style="background: #00000003; float: left; padding:0">
            <div class="col-12 mb_banner" style="position: relative; background: url(<?php echo $row['profile']; ?>); height: 100px"> </div>
          </div>
          <div class="col-8" style="float:right; height: 100px; background: #00000003">
            <h6 style="font-size: 16px; margin: 10px 0 0 0px;" class="u">@<?php echo $row['name']; ?></h6>
            <h6 style="font-size: 10px; font-weight: bold; margin: 10px 0 0 0px;" class=""><?php echo $row['email']; ?></h6>
            <h6 style="font-size: 10px; margin: 12px 0 0 0px;" class=""> <?php echo $row['phone']; ?></h6>

          </div>
        </div>


        <!-- add area -->
        <p style="margin-bottom: 0">
        <button style="margin-top: 12px" class="btn btn-sec bt" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
          Edit DP
        </button>
        <button class="btn btn-sec bt" type="button" style="margin-top: 12px; color: white; border: 0 !important" onclick="redirect('add_post.php')">
          Add post
        </button >
        <button class="btn btn-sec bt" type="button" style="margin-top: 12px; color: white; border: 0 !important" onclick="redirect('edit.php')">
          Edit Profile
        </button >
        <button class="btn btn-sec bt" type="button" style="margin-top: 12px; color: white; border: 0 !important" onclick="redirect('wallet.php')">
          Wallet
        </button >
        </p>


      <div class="collapse" id="collapse1">
        <div class="" style="font-size: 12px">
          <form action="upload.php" enctype="multipart/form-data" method="post" style="margin: 10px 0 0 0">
              <input type="file" name="image">
              <input type="submit" class="btn btn-success bt" style="color: white">
          </form>
        </div>
      </div>




      <!-- Post area -->
      <?php
      $user_id = $new->FindColumn("users", "phone='$phone'", "id");
      $result = $new->ReturnResult("posts", "user_id='$user_id' ORDER BY id DESC");
      while($row = mysqli_fetch_array($result)) {
          ?>
          <div style="background: rgba(0,0,0,0.04); margin: 10px 0; padding: 0; float: left" class="col-12">
            <img src="<?php echo $row['image_dir']; ?>" width="100%">
            <p class="u" style="padding: 2px 10px; margin: 0"><?php echo $row['caption']; ?></p>


          <?php
          /*
           * likes and comment count
           */
          $post_id = $row['id'];
          ?>
          <p style="padding: 2px 10px; margin: 0; font-size: 12px">
          <?php
          echo $new->count("likes", "post_id='$post_id'")."  likes ";
          echo $new->count("comments", "post_id='$post_id'")."  comments";

          ?>
          &#160;
          <a href="edit?id=<?php echo $post_id; ?>"  style="font-size: 10px">Edit</a>  &#160;
          <a href="delete.php?id=<?php echo $post_id; ?>"  style="font-size: 10px; color: #ff6c00">Delete</a>
          </p>
          <?php


          /*
           * link to the post
           */
           ?>
         </div>
           <?php

      }
      ?>

    </div>




</body>

    <script src="../design/js/jquery.min.js"></script>
    <script src="../design/bootstrap/js/bootstrap.min.js"></script>
    <script src="../design/js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
</html>
