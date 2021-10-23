<?php
include 'topbar.php';
include 'updateActivityDetail.php';
$today = date("Y-m-d");
?>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Admin Panel</title>
        <link rel='stylesheet' type='text/css' href='css/style.css' />
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
        <script type='text/javascript' src='js/dynamicpage.js'></script>
    </head>
    <body>
    <li><a href="editModules.php">Edit Modules</a></li>
    <li><a href="editActivity.php">Edit Activities</a></li>
    <li><a href="editUser.php">Edit User</a></li>
    <h1> Activity List</h1>
    <table>
        <tr>
            <th>Modules Name</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Description</th>
            <th>Control</th>
        </tr>
        <?php
        if (include 'DBConnect.php') {
            $sql = "SELECT * FROM `activity`";
            $result = $conn->query($sql) or die(mysqli_error());
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <tr>
                            <?php $activityID = $row ['activity_id']; ?>
                            <td> <!-- activity_name -->
                                <input type='text' name='activity_name' value ='<?php echo $row ['activity_name']; ?>'>
                            </td>
                            <td>
                                <input type='text' name='description' value ='<?php echo $row ['description']; ?>'>
                            </td>
                            <td> <!--  start date -->

                                <input type='date' name='start_date' value='<?php
                                $sql = "SELECT * FROM activity where activity_id = " . $activityID;
                                $resultdate = $conn->query($sql) or die(mysqli_error());
                                $startdate = date('Y-m-d', strtotime($row['start_date']));
                                echo $startdate;
                                ?>'><?php
                                       echo $dateErr;
                                       ?>
                            </td>
                            <td> <!-- end date -->

                                <input type='date' name='end_date' value='<?php
                                $enddate = date('Y-m-d', strtotime($row['end_date']));
                                echo $enddate;
                                ?>' min='<?php echo $start_date ?>'><?php
                                       echo $dateErr;
                                       ?>
                            </td>

                            <td>
                                <input type = 'hidden' name = 'activityID' value = '<?php echo $activityID; ?>'>
                                <input type = "submit" name = "activity_update" value="Update">
                    </form>
                    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type = 'hidden' name = 'activityID' value = '<?php echo $activityID; ?>'>
                        <input type = "submit" name = "activity_delete" value="Delete">
                    </form> 
                </td>
            </tr>
            <?php
        }
    }
    $conn->close();
}
?>
</table>
<br>
</body>
</html>
