<?php

session_start();
$today = date("Y-m-d H:i:s");
$uploader = $_SESSION["username"];
$target_dir = "./video/";
$target_file = $target_dir . basename($_FILES["videoToUpload"]["name"]);
$link = substr($_POST['linkToUpload'], 17);
$video_name = $_POST['videoName'];
$activity_id = $_POST['activity'];
$description = $_POST['description'];
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($link == null) {
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size > 50MB
//if ($_FILES["videoToUpload"]["size"] > 52428800) {
//  echo "Sorry, your file is too large.";
//  $uploadOk = 0;
//}
// Allow certain file formats

    if ($videoFileType != "wmv" && $videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "MP4") {
        echo "Sorry, only wmv, mp4 & avi files are allowed. " . htmlspecialchars(basename($_FILES["videoToUpload"]["name"]));
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 || empty($_POST["videoName"]) || empty($_POST["activity"])) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if ($link == null) {
        if (move_uploaded_file($_FILES["videoToUpload"]["tmp_name"], $target_file)) {
            $path_link = basename($_FILES["videoToUpload"]["name"]);
            include_once 'DBConnect.php';
            $sql = "INSERT INTO `video`(`video_type_id`, `activity_id`, `video_name`, `description`, `file_path`, `creted_date`, `created_by`)"
                    . " VALUES (2, '$activity_id','$video_name','$description','$path_link','$today','$uploader')";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                echo "The file " . htmlspecialchars(basename($_FILES["videoToUpload"]["name"])) . " has been uploaded for Module" . $activity_id;
            }
            $conn->close();
            header("location: moduleManage.php");
        }
    } elseif ($link != null) {
        include_once 'DBConnect.php';
        $sql = "INSERT INTO `video`(`video_type_id`, `activity_id`, `video_name`, `description`,`url_link`, `creted_date`, `created_by`) "
                . "VALUES (1, '$activity_id','$video_name','$description','$link', '$today','$uploader')";

        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        //echo $link;
        header("location: moduleManage.php");
    } else {
        echo "Sorry, there was an error uploading your file. ";
    }
}
?>