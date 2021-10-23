<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['document_delete'])) {
    $docID = $_POST['document_id'];
    if (include 'DBConnect.php') {
        $sql = "DELETE FROM `document` WHERE `document_id`='$docID'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    echo $sql;
    header("Location:moduleManage.php");
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['video_delete'])) {
    $videoID = $_POST['video_id'];
    if (include 'DBConnect.php') {
        $sql = "DELETE FROM `video` WHERE `video_id` = '$videoID'";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    echo $sql;
    header("Location:moduleManage.php");
}
?>