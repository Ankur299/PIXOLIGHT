<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
    include "../dbconnect.php";
    require_once "../main.php";

    $new = new main($link);
    if($_GET['limit']=="") {
        $limit = 1;
    }
    else{
        $limit =  $_GET['limit'];
    }
    $result = $new->ReturnResult("posts", "1=1 ORDER BY views Limit $limit ");


    ?>
    <div id="main">
    <?php

    while($row = mysqli_fetch_array($result)){
        print_r($row);
        echo "<br><br>";

    }
    ?>
    </div>

    <button id="load"  onclick="load('main')" data=<?php echo $limit+1; ?>>Load more</button>

<script src="../functions.js"></script>
<script>
   // alert(window.location);
</script>
