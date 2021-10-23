<?php
include 'topbar.php';
include 'updateModuleDetail.php';
$today = date("Y-m-d");
?>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Admin Panel</title>
        <link rel='stylesheet' type='text/css' href='css/style.css' />
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    </head>
    <body>
    <li><a href="editModules.php">Edit Modules</a></li>
    <li><a href="editActivity.php">Edit Activities</a></li>
    <li><a href="editUser.php">Edit User</a></li>
    <h1> Modules List</h1>
    <?php
    echo $dateErr;
    ?>
    <table>
        <tr>
            <th>Modules Name</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Control</th>
        </tr>
        <?php
        if (include 'DBConnect.php') {
            $sql = "SELECT * FROM `module`";
            $result = $conn->query($sql) or die(mysqli_error());
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <tr>
                            <?php $moduleID = $row ['module_id']; ?>
                            <td> <!-- module_name -->
                                <input type='text' name='module_name' value ='<?php echo $row ['module_name']; ?>'>
                            </td>
                            <td> <!--  start date -->

                                <input type='date' name='start_date' value='<?php
                                $sql = "SELECT * FROM module where module_id = " . $moduleID;
                                $resultdate = $conn->query($sql) or die(mysqli_error());
                                $startdate = date('Y-m-d', strtotime($row['start_date']));
                                echo $startdate;
                                ?>' >
                            </td>
                            <td> <!-- end date -->

                                <input type='date' name='end_date' value='<?php
                                $enddate = date('Y-m-d', strtotime($row['end_date']));
                                echo $enddate;
                                ?>' min='<?php echo $start_date ?>'>
                            </td>
                            <td>
                                <input type = 'hidden' name = 'moduleID' value = '<?php echo $moduleID; ?>'>
                                <input type = "submit" name = "module_update" value="Update">
                    </form>
                     <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type = 'hidden' name = 'moduleID' value = '<?php echo $moduleID; ?>'>
                        <input type = "submit" name = "module_delete" value="Delete">
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
