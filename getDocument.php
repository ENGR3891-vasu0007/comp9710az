<?php
$getDocument = "SELECT * FROM document d, activity a WHERE d.activity_id = a.activity_id && a.module_id = $moduleID";
$resultDocument = $conn->query($getDocument) or die(mysqli_error());
?>
<button class="collapsible">Show PDF</button>
<div class="content">
    <?php
    if ($resultDocument->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultDocument)) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
                <input type = 'hidden' name = 'DocumentID' value = '<?php echo $row ['document_id']; ?>'>
                <input type = "submit" name = "show_document" value="Show  <?php echo $row ['document_name'] ?>">
            </form>
            <?php
        }
    } else {
        ?><p>There are no documents yet</p>
        <?php
    }
    ?></div>