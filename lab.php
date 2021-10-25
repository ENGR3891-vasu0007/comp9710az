
<?php
include 'topbar.php';
$activity_id = "";
$activity_name = "";
$doc_link = "";
$doc_name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_activity'])) {
    $activityID = $_POST['activityID'];
    if (include 'DBConnect.php') {
        $sql = "SELECT * FROM `document` d ,`activity` a WHERE a.activity_id = $activityID AND d.activity_id = $activityID";
        $result = $conn->query($sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            $activity_id = $row ['activity_id'];
            $activity_name = $row ['activity_name'];
            $doc_link = $row ['file_path'];
            $doc_name = $row ['document_name'];
        }
    }
}
?> 
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/styleLab.css">
    </head>
    <body>
        <div class="split left">
            <p><?php
                if ($activityID == "") {
                    header("Location: user.php");
                    exit;
                }
                if ($activity_name == "") {
                    echo "Activity not exist";
                } else {
                    echo $activity_name;
                }
                ?></p>
            <?php
            $getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $activityID";
            $resultVideo = $conn->query($getVideo) or die(mysqli_error());
            if ($resultVideo->num_rows > 0) {
                while ($row = mysqli_fetch_array($resultVideo)) {
                    if ($row['video_type_id'] == 2) {
                        ?>
                        <p>Video: <?php echo $row ['video_name']; ?></p>
                        <video width="400" controls>
                            <source src="video/<?php echo $row ['file_path']; ?>" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                        <br>
                        <?php
                    } elseif ($row['video_type_id'] == 1) {
                        ?>
                        <p>Video: <?php echo $row ['video_name']; ?></p>
                        <iframe width="400" height="315" src="https://www.youtube.com/embed/<?php echo $row['url_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <br>
                        <?php
                    }
                }
            } else {
                ?>
                <p>There are no videos yet</p>
            <?php }
            ?>
            <p>Document: </p>
            <iframe src="<?php
            if ($doc_link != "") {
                echo "pdf/" . $doc_link;
            }
            ?>" width="100%" height="100%">
            </iframe>

        </div>
    </div>

    <div class="split right">
        <?php
        $getIP1 = "";
        $getIP2 = "";
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM `users` WHERE `username` = '$user'";
        $result = $conn->query($sql) or die(mysqli_error());
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $getIP1 = $row ['vm1_port'];
                $getIP2 = $row ['vm2_port'];
            }
        }
        $conn->close();
        ?>
        <a href="http://23.96.45.10:<?php echo $getIP1; ?>/">Full screen for Kali</a>
        <iframe src="http://23.96.45.10:<?php echo $getIP1; ?>/" id="kali"  width="100%" height="50%"></iframe>
        <a href="http://23.96.45.10:<?php echo $getIP2; ?>/">Full screen for Metasploitable</a>
        <iframe src="http://23.96.45.10:<?php echo $getIP2; ?>/" id="metasploitable "  width="100%" height="50%"></iframe>
    </div>
</body>
</html> 