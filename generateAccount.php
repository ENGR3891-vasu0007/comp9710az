<html>
    <?php
    include 'topbar.php';
    ?>
    <head>
        <title>Generate Account</title>
        <link rel="stylesheet" type="text/css" href="css/moduleManage.css"/>
    </head>
    <body>
        <div class="container">
            <form method="post" name="user_register_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_register"> 
                <div class="title">Insert a single user</div>
                <br>
                Title:
                <input type="text" name="title"><br>
                First name:
                <input type="text" name="firstName"><br>
                Middle name:
                <input type="text" name="midName"><br>
                Last name:
                <input type="text" name="lastName"><br>
                Username:
                <input type="text" name="username"><br>
                Fan id:
                <input type="text" name="fan"><br><span class="error"><?php echo $fanErr; ?></span>
                Role:
                <select name="role">
                    <?php
                    include 'DBConnect.php';
                    $getCourse = "SELECT * FROM role";
                    $result = $conn->query($getCourse) or die(mysqli_error());
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row ['role_id'] ?>"><?php echo $row ['role_name'] ?></option>
                            <?php
                        }
                    }
                    $conn->close();
                    ?></select><br>
                <input type="submit" form="user_register" value="Register" name="register_submit" class="registerbtn">
            </form>
        </div>
        <br>
        OR
        <div class="container">
            <div class="title">Insert the excel sheet</div>
            <form method="post" action="importCSV.php" enctype="multipart/form-data">
                <input type="file" name="file"/>
                <input type="submit" name="submit_file" value="Submit"/>
            </form>
        </div>
    </body>
</html>