<table>
    <tr>
        <th>Activity name</th>
        <th>Due</th>
        <th>Total mark</th>
        <th>Grade</th>
        <th>Submition State</th>
    </tr>
    <?php
    include 'DBConnect.php';
    $user_id = $_SESSION['userid'];
    $sql = "SELECT * FROM activity_grade ag, activity a WHERE user_id = $user_id && ag.activity_id = a.activity_id";
    $result = $conn->query($sql)or die(mysqli_error());
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($row['attemp_no'] == 0){
                $state = "Not attempted";
            }
            else {
                $state = "Submitted";
            }
            ?>
            <tr> 
                <td><?php echo $row['activity_name'] ?></td>
                <td><?php echo $row['end_date'] ?></td>
                <td><?php echo $row['total_mark'] ?></td> 
                <td><?php echo $row['total_received_mark'] ?></td> 
                <td><?php echo $state; ?></td>
            </tr>
            <?php
        }
    }
    ?>

