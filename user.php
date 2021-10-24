<html>
    <?php
    echo "SESSION[usertype] = " . $_SESSION["usertype"];
    include 'topbar.php';
    ?>
    <head>
        <title>User page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-5.1.2-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/styleBG2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
            function resizeIframe(obj)
            {
                obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }
        </script>
    </head>
    <body>
        <div class="container-fluid p-0 m-0" style=" padding-top:51px !important">
            <div class="row m-0">
                <div class="col-12 col-md-4 split left p-0">
                    <section id="main-content">
                        <div id="guts">
                            <?php
                            include 'readModules.php';
                            ?>
                        </div>
                    </section>
                </div><!-- Left -->

                <div class="col-12 col-md-8 split right">
                    <?php
                    include 'rightDashboard.php';
                    ?>
                </div>
            </div>
        </div>
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function () {
                    this.classList.toggle("view");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>

    </body>
</html> 