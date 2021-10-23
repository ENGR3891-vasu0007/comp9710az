<?php
include 'topbar.php';
include 'getModuleDetail.php';
$today = date("Y-m-d");
$state = "";
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.2-dist/css/bootstrap.min.css"/> 
        <link rel="stylesheet" type="text/css" href="css/moduleManage.css"/>
    </head>
    <body>
        <div id = "container">
            <h3 id = heading> Modules List</h3>
            <table class="table table-striped">
                <thead id = "thead">
                    <tr>
                        <th>Modules Name</th>
                        <th>Documents</th>
                        <th>Activities</th>
                        <th>Videos</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $moduleID = $row ['module_id'];
                            $start_date = $row['start_date'];
                            $end_date = $row['end_date'];
                            $today_time = strtotime($today);
                            $start_time = strtotime($start_date);
                            $end_time = strtotime($end_date);
                            if ($today_time > $start_time && $today_time < $end_time) {
                                $state = "This module is currently active";
                            } elseif ($today_time < $start_time) {
                                $state = "This module will start at " . $row['start_date'];
                            } elseif ($today_time > $end_time) {
                                $state = "This module was expired at " . $row['end_date'];
                            }
                            ?>
                            <tr>
                        <form class = "Update-form" method = "POST" action="deleteDocVideo.php">
                            <td> <!<!-- module_name -->
                                <?php echo $row ['module_name']; ?></td>
                            <td><!-- Documents --><?php
                                $getDocument = "SELECT * FROM document d, activity a WHERE d.activity_id = a.activity_id && a.module_id = $moduleID";
                                $resultDocument = $conn->query($getDocument) or die(mysqli_error());
                                if ($resultDocument->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($resultDocument)) {
                                        ?><p><a href="./pdf/<?php echo $row ['file_path'] ?>"><?php echo $row ['document_name']; ?>

                                        </p>
                                        <form method="post" action="deleteDocVideo.php">
                                            <input  type = 'hidden' value="<?php echo $row ['document_id'] ?>" name="document_id">
                                            <input  type="submit" name="document_delete" value="Delete">
                                        </form><?php
                                    }
                                }
                                ?></td>
                            <td><!-- Activities --><?php
                                $getActivity = "SELECT * FROM activity WHERE module_id = $moduleID";
                                $resultActivity = $conn->query($getActivity) or die(mysqli_error());
                                if ($resultActivity->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($resultActivity)) {
                                        ?><p><?php echo $row ['activity_name']; ?></p><?php
                                    }
                                }
                                ?></td> 
                            <td><!-- Videos -->
                                <?php
                                $getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $moduleID";
                                $resultVideo = $conn->query($getVideo) or die(mysqli_error());
                                if ($resultVideo->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($resultVideo)) {
                                        if ($row['video_type_id'] == 1) {
                                            ?><p><a href="https://youtu.be/<?php echo $row ['url_link'] ?>"><?php echo $row ['video_name']; ?></a></p><?php
                                        } elseif ($row['video_type_id'] == 2) {
                                            ?><p><a href="./video/<?php echo $row ['file_path'] ?>"><?php echo $row ['video_name']; ?></a></p><?php }
                                        ?>
                                        <form method = "post" action = "deleteDocVideo.php">
                                            <input type = 'hidden' value = "<?php echo $row['video_id']; ?>" name = "video_id">
                                            <input type = "submit" name = "video_delete" value = "Delete">
                                        </form>
                                    <?php }
                                    ?>

                                    <?php
                                }
                                ?>

                            </td>
                            <td><!--State-->
                                <?php echo $state; ?></td>
                        </form>
                        <!--                    <form class = "Delete-form" method = "POST" action="updateModuleDetail.php">
                        <?php echo "<input type = 'hidden' name = 'moduleID' value = '" . $moduleID . "'>"; ?>
                                                <button type = "submit" name = "module_delete">Delete</button>
                                            </form>-->
                        </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <button onclick="window.location.href = 'newModuleActivity.php'">Create new Module / Activity</button>
            <button onclick="window.location.href = 'upload.php'">Upload new Video/PDF</button>
    </body>
</html>