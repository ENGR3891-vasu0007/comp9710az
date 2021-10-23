<?php
include 'topbar.php';
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
        <div id="page-wrap">
            <header>
                <h1>Admin Panel</h1>
                <nav>
                    <ul class="group">
                        <li><a href="editModules.php">Edit Modules</a></li>
                        <li><a href="editUser.php">Edit User</a></li>
                        <li><a href="viewMenu.php">Module Menu</a></li>
                    </ul>
                </nav>
            </header>
            <section id="main-content">
                <div id="guts">
                    <?php include 'readModules.php'; ?>
                </div>
            </section>
        </div>
    </body>
</html>
