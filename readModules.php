<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/styleBG2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
    function resizeIframe(obj)
    {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>
<?php
include 'DBConnect.php';
$today = date('Y-m-d H:i:s');
$sql = "SELECT * FROM module WHERE start_date < '$today'  && end_date > '$today'";
$result = $conn->query($sql) or die(mysqli_error());
while ($row = mysqli_fetch_array($result)) {
    $moduleID = $row ['module_id'];
    ?>
    <button class="collapsible"><?php
        echo $row ['module_name'];
        ?></button><div class="content">
        <?php
        include 'getDocument.php';
        include 'getVideo.php';
        include 'getActivity.php';
        include 'setTest.php';
        ?> 

    </div><?php
}
$conn->close();
?>
           

