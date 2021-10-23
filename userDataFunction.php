<?php

$user_id = "";
$email = "";
$reemail = "";
$test_reemail = "";
$passwd = "";
$repasswd = "";
$test_repasswd = "";
$emailErr = "";
$reemailErr = "";
$passwdErr = "";
$repasswdErr = "";
$allow_email_to_input = FALSE;
$allow_passwd_to_input = FALSE;

//update email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_submit'])) {
    //email input verification
    if (empty($_POST["email"])) {
        $emailErr = "Please input your email";
        $allow_email_to_input = FALSE;
    }
    if (empty($_POST["reemail"])) {
        $reemailErr = "Please re-input your email";
    } else {
        $email = $_POST["email"];
        $reemail = $_POST["reemail"];
        $test_reemail = $_POST["test_reemail"];
        $allow_email_to_input = TRUE;
        // check if e-mail address is in email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $allow_email_to_input = FALSE;
        }
// check if the emails are the same
        if ($reemail != $test_reemail) {
            $reemailErr = "Email mismatch";
            $allow_email_to_input = FALSE;
        }
    }
    $user_id = $_POST["userID"];
    //input to database
    if ($allow_email_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $sql = "SELECT * FROM users WHERE user_id = '$user_id' && email_address = '$email'";
            $result = $conn->query($sql) or die(mysqli_error());
            if ($result === FALSE) {
                $emailErr = "Wrong email address";
                $allow_email_to_input = FALSE;
            } elseif ($result->num_rows > 0) {
                $sql = "UPDATE users SET email_address = '$reemail' WHERE user_id = '$user_id'";
                $result = $conn->query($sql) or die(mysqli_error());
                if ($result === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } else {
                    $conn->close();
                    //redundancy below	
                    $allow_email_to_input = FALSE;
                }
            }
        }
    }
}
//update password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pass_submit'])) {
//password input verification
    if (empty($_POST["passwd"])) {
        $passwdErr = "Please input the new password";
        $allow_passwd_to_input = FALSE;
    }
    if (empty($_POST["repasswd"])) {
        $repasswdErr = "Please re-input the new password";
    } else {
        $passwd = $_POST["passwd"];
        $repasswd = $_POST["repasswd"];
        $test_repasswd = $_POST["test_repasswd"];
        $allow_passwd_to_input = TRUE;
        // check if password only contains letters and number
        if (!preg_match("/^[a-zA-Z0-9]+$/", $repasswd)) {
            $repasswdErr = "Only letters and number are allowed";
            $allow_passwd_to_input = FALSE;
        }
// check if the password only contains letters and whitespace
        if ($repasswd != $test_repasswd) {
            $repasswdErr = "Password mismatch";
            $allow_passwd_to_input = FALSE;
        }
    }
    $user_id = $_POST["userID"];
//input to database
    if ($allow_passwd_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $sql = "SELECT * FROM users WHERE user_id = '$user_id' && password = md5('$passwd')";
            $result = $conn->query($sql) or die(mysqli_error());
            if ($result === FALSE) {
                $passwdErr = "Wrong password";
                $allow_passwd_to_input = FALSE;
            } elseif ($result->num_rows > 0) {
                $sql = "UPDATE users SET password = md5('$repasswd') WHERE user_id = '$user_id'";
                $result = $conn->query($sql) or die(mysqli_error());
                if ($result === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                } else {
                    $conn->close();
                    //redundancy below	
                    $allow_passwd_to_input = FALSE;
                }
            }
        }
    }
}
?>