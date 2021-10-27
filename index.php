<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'user_register_login.php';
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Redirect user to activity page
    if ($_SESSION["usertype"] == 3) {
        header('Location: user.php');
    } else {
        header('Location: moduleManage.php');
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.2-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>COMP9710</title>

    </head>

    <body style="background-image: url(img/img1.png);
          background-repeat: no-repeat;
          background-size: cover;
          width: 100%;
          max-height: 100vh;
          overflow: hidden;">
        <div class="container login-page">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="login" class="form-group">
                        <div id="image-container" class="image-container">
                            <img id="logo-image" src="img/logo.png" />
                        </div>
                        <h1>Welcome to Cybersecuity Labs!
                            To obtain access, make sure you enrol to the topic and contact topic coordinators to activate
                            your account.
                        </h1>
                        <form class="form-group" method="post" name="user_login_submit"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off"
                              id="user_login">
                            <input type="text" placeholder="Username" class="Uname" value="<?php echo $Lusername ?>" name="Lusername"
                                   onselectstart="return false" onpaste="return false;" onCopy="return false"
                                   onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off /><span
                                   class="error"><?php echo $LusernameErr; ?></span><br></br>

                            <input type="password" placeholder="Password" class="Pass" value="<?php echo $Lpasswd ?>" name="Lpasswd"
                                   onselectstart="return false" onpaste="return false;" onCopy="return false"
                                   onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off /><span
                                   class="error"><?php echo $LpasswdErr; ?></span><br>
                            <input type="submit" form="user_login" value="Login" name="login_submit" class="btn btn-primary loginbtn mt-4">
                        </form>
                        <a href="forgot-password.php" class="link-primary mt-3">Forgot Password</a>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
