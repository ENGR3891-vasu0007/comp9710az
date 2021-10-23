<?php
include 'topbar.php';
include 'userDataFunction.php';
?>
<html>
    <head>
        <title> Profile Page </title>
        <link rel="stylesheet" href="css/styleBG.css">
    </head>
    <body>
        <h1>Profile Page</h1>
        <br>
        <!--    This shows the current account details -->	
    <center>
        <div>
            <?php
            include 'DBConnect.php';
            $sql = "SELECT * FROM `users` WHERE user_id = " . $_SESSION["userid"] . "";
            $result = $conn->query($sql)or die(mysqli_error());
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <hr>
                <div>
                    <?php
                    echo "Username:" . $row['username'] . "<br>";
                    echo "Email:" . $row['email_address'] . "<br>";
                    echo "Password:" . $row['password'];
                    ?>
                </div>
                <hr>
                <?php
            }
            ?>
        </div>
    </center>
    <div class="container">
        <div class="row">
            <div class="col">
                <!--    this is to update the Password of the account -->
                <form method="post" name="user_pass_update" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="pass_update"> 
                    <h2>Update Password</h2>
                    <hr>
                    <input type="password" placeholder="Enter password" name="passwd" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $passwdErr; ?></span>
                    <input type="password" placeholder="Enter new password" name="repasswd" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $repasswdErr; ?></span><br>
                    <input type="password" placeholder="Repeat new password" name="test_repasswd" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $repasswdErr; ?></span><br>
                    <?php echo "<input type = 'hidden' name = 'userID' value = '" . $_SESSION["userid"] . "'>"; ?>
                    <hr>
                    <input type="submit" form="pass_update" value="Update Password" name="pass_submit" class="btn">
                </form>
            </div>
            <div class="col">
                <!--    this is to update the Email of the account-->
                <form method="post" name="user_email_update" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="email_update">
                    <h2>Update Email Address</h2>
                    <hr>
                    <input type="text" name="email" placeholder="Enter email" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $emailErr; ?></span>
                    <input type="text" name="reemail" placeholder="Enter new email" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $reemailErr; ?></span><br>
                    <input type="text" name="test_reemail" placeholder="Confirm new email" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                    <span class="error"><?php echo $reemailErr; ?></span><br>
                    <?php echo "<input type = 'hidden' name = 'userID' value = '" . $_SESSION["userid"] . "'>"; ?>
                    <hr>
                    <input type="submit" form="email_update" value="Update Email" name="email_submit" class="btn">
                </form>
            </div>
        </div>
    </body>
</html>