<?php
session_start();
date_default_timezone_set('Australia/Adelaide');
include 'user_register_login.php';
?>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/styleBG.css"/>
    </head>
    <script>
        /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <body>
        <?php
        echo "<div class=\"topnav\" id=\"myTopnav\">";
        echo "<img class='brand-image' src='img/logo-white.png' />";
        //if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        echo "<a class=\"logout\" href=\"logout.php\">Logout</a>";
        if (basename($_SERVER['PHP_SELF']) == "QandA.php") {
            echo "<a class=\"active\" href=\"QandA.php\">?</a>";
        } else {
            echo "<a class=\"QnA\" href=\"QandA.php\">?</a>";
        }
        if (basename($_SERVER['PHP_SELF']) == "userDataPage.php") {
            echo "<a class=\"active\" href=\"userDataPage.php\" class=\"username\">Welcome, " . $_SESSION["username"] . "</a></b>";
        } else {
            echo "<b><a href=\"userDataPage.php\" class=\"username\">Welcome, " . $_SESSION["username"] . "</a></b>";
        }

        if ($_SESSION["usertype"] != 3) {
            if (basename($_SERVER['PHP_SELF']) == "admin.php") {
                echo "<a class=\"active\" href=\"moduleManage.php\">Home</a>";
            } else {
                echo "<a href=\"moduleManage.php\">Home</a>";
            }
            if (basename($_SERVER['PHP_SELF']) == "adminPanel.php") {
                echo "<a class=\"active\" href=\"adminPanel.php\">Admin Panel</a>";
            } else {
                echo "<a href=\"adminPanel.php\">Admin Panel</a>";
            }
            if (basename($_SERVER['PHP_SELF']) == "generateAccount.php") {
                echo "<a class=\"active\" href=\"generateAccount.php\">Generate Account</a>";
            } else {
                echo "<a href=\"generateAccount.php\">Generate Account</a>";
            }
        } else
        if ($_SESSION["usertype"] == 3) {
            if (basename($_SERVER['PHP_SELF']) == "user.php") {
                echo "<a class=\"active\" href=\"user.php\">Home</a>";
            } else {
                echo "<a href=\"user.php\">Home</a>";
            }
        }
        //} else {
        if (basename($_SERVER['PHP_SELF']) == "index.php") {
            echo "<a class=\"active\" href=\"index.php\">Login/Sign up</a>";
        } else {
            echo "<a href=\"index.php\">Login/Sign up</a>";
        }
        //}
        echo "<a href=\"javascript:void(0);\" class=\"icon\" onclick=\"myFunction()\">";
        echo "<i class=\"fa fa-bars\"></i>";
        echo "</a>";
        echo "</div>";
        ?>
    </body>
</html>

