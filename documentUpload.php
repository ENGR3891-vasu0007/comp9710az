<?php

$target_dir = "./pdf/";
$target_file = $target_dir . basename($_FILES["docToUpload"]["name"]);
$doc_name = $_POST['pdfName'];
$activity_id = $_POST['activity'];
$description = $_POST['description'];
$uploadOk = 1;
$docFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//  echo "Sorry, your file is too large.";
//  $uploadOk = 0;
//}
// Allow certain file formats
if ($docFileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["docToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["docToUpload"]["name"])) . " has been uploaded for Module" . $module_num;
        $doc_link = basename($_FILES["docToUpload"]["name"]);
        include_once 'DBConnect.php';
        $sql = "INSERT INTO `document`(`activity_id`, `document_name`, `description`, `file_path`) VALUES ('$activity_id','$doc_name','$description','$doc_link')";
        $result = $conn->query($sql) or die(mysqli_error());
        $conn->close();
        header("location: moduleManage.php");
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>