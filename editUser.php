<?php
include 'topbar.php';
include 'updateUserDetail.php';
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
    <h1> User List</h1>
    <table>
        <tr>
            <th>Role</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Control</th>
        </tr>
        <?php
        if (include 'DBConnect.php') {
            $sql = "SELECT * FROM `users`";
            $result = $conn->query($sql) or die(mysqli_error());
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $role_id = $row ['role_id'];
                    $username = $row ['username'];
                    $first_name = $row ['first_name'];
                    $middle_name = $row ['middle_name'];
                    $last_name = $row ['family_name'];
                    $gender = $row ['gender'];
                    $email_address = $row ['email_address'];
                    $userID = $row ['user_id'];
                    ?>
                    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <tr>
                            <td> 
                                <select name="role">
                                    <?php
                                    $getrole = "SELECT * FROM role";
                                    $result1 = $conn->query($getrole) or die(mysqli_error());
                                    if ($result1->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($result1)) {
                                            ?>
                                            <option value="<?php echo $row ['role_id'] ?>" <?php
                                            if ($row ['role_id'] == $role_id) {
                                                echo "selected";
                                            }
                                            ?>><?php echo $row ['role_name'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?></select>
                            </td>  
                            <td> <!-- user_name -->
                                <input type='text' name='user_name' value ='<?php echo $username; ?>'>
                            </td>
                            <td> 
                                <input type='text' name='firstName' value ='<?php echo $first_name; ?>'>
                            </td>
                            <td> 
                                <input type='text' name='midName' value ='<?php echo $middle_name; ?>'>
                            </td>
                            <td> 
                                <input type='text' name='lastName' value ='<?php echo $last_name; ?>'>
                            </td>  
                            <td> 
                                <select name="gender">
                                    <?php if ($gender == "M") { ?>
                                        <option value="M" selected>M</option>
                                        <option value="F">F</option>
                                    <?php } elseif ($gender == "F") { ?>
                                        <option value="M">M</option>
                                        <option value="F" selected >F</option>
                                    <?php } else { ?>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    <?php } ?>
                                </select>
                            </td>  
                            <td> 
                                <input type='text' name='email' value ='<?php echo $email_address; ?>'>
                            </td>  
                            <td>
                                <input type = 'hidden' name = 'userID' value = '<?php echo $userID; ?>'>
                                <input type = "submit" name = "user_update" value="Update">
                    </form>
                    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type = 'hidden' name = 'userID' value = '<?php echo $userID; ?>'>
                        <input type = "submit" name = "user_delete" value="Delete">
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
