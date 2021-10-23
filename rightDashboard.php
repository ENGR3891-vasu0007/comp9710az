<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show_document'])) {
    $docID = $_POST['DocumentID'];
    if (include 'DBConnect.php') {
        $sql = "SELECT * FROM `document` WHERE  `document_id`= $docID";
        $result = $conn->query($sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['doc_link'] = $row ['file_path'];
            $_SESSION['doc_name'] = $row ['document_name'];
            $_SESSION['load'] = "document";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show_video'])) {
    $videoID = $_POST['VideoID'];
    if (include 'DBConnect.php') {
        $sql = "SELECT * FROM `video` WHERE  `video_id`= $videoID";
        $result = $conn->query($sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION["file_path"] = $row ['file_path'];
            $_SESSION['video_name'] = $row ['video_name'];
            $_SESSION["url_link"] = $row ['url_link'];
            $_SESSION["video_type_id"] = $row['video_type_id'];
            $_SESSION["load"] = "video";
        }
    }
}
if ($_SESSION["load"] == "document") {
    ?>
    <div class="title"><?php echo $_SESSION["doc_name"]; ?></div>
    <iframe src = "pdf/<?php echo $_SESSION["doc_link"] ?>#zoom=100" width = "100%" height = "500px">
    </iframe>
    <?php
} elseif ($_SESSION["load"] == "video") {
    if ($_SESSION["video_type_id"] == 2) {
        ?>
        <div class="title"><?php echo $_SESSION['video_name']; ?></div>
        <video width="400" controls>
            <source src="video/<?php echo $_SESSION['file_path']; ?>" type="video/mp4">
            Your browser does not support HTML video.
        </video>
        <br>
        <?php
    } elseif ($_SESSION["video_type_id"] == 1) {
        ?>
        <div class="title"><?php echo $_SESSION['video_name']; ?></div>
        <iframe width="400" height="315" src="https://www.youtube.com/embed/<?php echo $_SESSION['url_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br>
        <?php
    }
}
?>
<section id="main-content">
    <div id="guts">
        <button class="collapsible">Show process</button>
        <div class="content">
            <?php include 'showProcess.php'; ?>
        </div>
    </div>
</section>