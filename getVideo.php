<?php
$getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $moduleID";
$resultVideo = $conn->query($getVideo) or die(mysqli_error());
?>
<button class="collapsible">Video</button>
<div class="content">
    <?php
    if ($resultVideo->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultVideo)) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
                <input type = 'hidden' name = 'VideoID' value = '<?php echo $row ['video_id']; ?>'>
                <input type = "submit" name = "show_video" value="Show  <?php echo $row ['video_name'] ?>">
            </form>
            <?php
        }
    } else {
        ?>
        <p>There are no videos yet</p>
    <?php }
    ?></div>