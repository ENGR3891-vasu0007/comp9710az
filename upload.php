<?php include 'topbar.php'; ?>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.2-dist/css/bootstrap.min.css"/> 
    <link rel="stylesheet" type="text/css" href="css/moduleManage.css"/>
</head>
<script src="js/bootstrap-5.1.2-dist/js/bootstrap.min.js"></script>
<div class="upload-section">
    <!-- Video -->

    <div class="title">New Video</div>
    <form action="videoUpload.php" method="post" enctype="multipart/form-data">
        <div>
            <label>Select Video to upload:</label>
            <input type="file" name="videoToUpload" id="videoToUpload">
        </div>
        <div>
            <label>or Input a Youtube link:</label>
            <input type="text" name="linkToUpload" id="linkToUpload">
        </div>
        <div>
            <label>Video Name: </label>
            <input type="text" name="videoName" id="videoName" placeholder="Input the title for the video">
        </div>
        <div>
            <label>For Activity: </label>
            <select name="activity" id="activity">
                <?php
                include 'DBconnect.php';
                $getActivity = "SELECT * FROM activity";
                $resultActivity = $conn->query($getActivity) or die(mysqli_error());
                if ($resultActivity->num_rows > 0) {
                    while ($row = mysqli_fetch_array($resultActivity)) {
                        ?>
                        <option value="<?php echo $row ['activity_id'] ?>"><?php echo $row ['activity_name'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label> Description:</label>
            <input type="text" name="description" id="description" placeholder="Input description">     
        </div>
        <div>
            <label></label>
            <input type="submit" value="Upload Video" name="submit">
        </div>
    </form>
</div>
<div class="upload-section">
    <!-- Document -->
    <div class="title">New Document</div>
    <form action="documentUpload.php" method="post" enctype="multipart/form-data">
        <div>
            <label>Select Document to upload:</label>
            <input type="file" name="docToUpload" id="docToUpload">
        </div>
        <div>
            <label>PDF Name: </label>
            <input type="text" name="pdfName" id="pdfName" placeholder="Input the title for the pdf">
        </div>
        <div>
            <label>For Activity: </label>
            <select name="activity" id="activity">
                <?php
                include 'DBconnect.php';
                $getActivity = "SELECT * FROM activity";
                $resultActivity = $conn->query($getActivity) or die(mysqli_error());
                if ($resultActivity->num_rows > 0) {
                    while ($row = mysqli_fetch_array($resultActivity)) {
                        ?>
                        <option value="<?php echo $row ['activity_id'] ?>"><?php echo $row ['activity_name'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label>Description:</label>
            <input type="text" name="description" id="description" placeholder="Input description">
        </div>
        <div>
            <label></label>
            <input type="submit" value="Upload Document" name="submit">
            </form>
        </div>