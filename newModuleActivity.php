<?php
include 'topbar.php';
include 'uploadModuleActivity.php';
?>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.2-dist/css/bootstrap.min.css"/> 
        <link rel="stylesheet" type="text/css" href="css/moduleManage.css"/>
    </head>
    <body>
        <div class="upload-section">
            <form method="post" name="newModule" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="title">New Module</h2></div>
                <hr>
                <div>
                    <label>Course:</label>
                    <select name="course" id="course">
                        <?php
                        include 'DBconnect.php';
                        $getCourse = "SELECT * FROM course";
                        $result = $conn->query($getCourse) or die(mysqli_error());
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row ['course_id'] ?>"><?php echo $row ['course_name'] ?></option>
                                <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </select><br>
                </div>
                <div>
                    <label>Module name:</label>
                    <input type="text" name="moduleName" id="moduleName"><br>
                    <span class="error"><?php echo $dateErr; ?></span><br>
                </div>
                <div>
                    <label>Start date:</label>
                    <input type='date' name='start_date'><br>
                </div>
                <div>
                    <label>End date:</label>
                    <input type='date' name='end_date'><br>
                </div>
                <hr>
                <div>
                    <label></label>
                    <input type="submit" value="Submit module" name="module_submit">
                    </form>
                </div>
        </div>
        <div class="upload-section">
            <form method="post" name="newActivity" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="title">New Activity</div>
                <hr>
                <div>
                    <label>Module:</label>
                    <select name="module" id="module">
                        <?php
                        include 'DBconnect.php';
                        $getModule = "SELECT * FROM module";
                        $result = $conn->query($getModule) or die(mysqli_error());
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row ['module_id'] ?>"><?php echo $row ['module_name'] ?></option>
                                <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </select><br>
                </div>
                <div>
                    <label>Activity Name:</label>
                    <input type="text" name="activityName" id="activityName"><br>
                </div>
                <div>
                    <label>Description:</label>
                    <input type="text" name="description" id="description"><br>
                    <span class="error"><?php echo $dateErr; ?></span><br>
                </div>
                <div>
                    <label>Start date:</label>
                    <input type='date' name='start_date'><br>
                </div>
                <div>
                    <label>End date:</label>
                    <input type='date' name='end_date'><br>
                </div>
                <hr>
                <div>
                    <label></label>
                    <input type="submit" value="Submit activity" name="activity_submit">
                    </form>
                </div>
        </div>
    </body>
</html>