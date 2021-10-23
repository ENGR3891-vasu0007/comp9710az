<?php
include 'topbar.php';
?>
<html>
    <body>
        <h2>Generate Account</h2>
        <h3>Confirm the imported student detail</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Family Name</th>
                <th>Sex</th>
                <th>Username</th>
                <th>Email</th>
                <th>Student ID</th>
                <th>FAN</th>
            </tr>
            <?php
            if (isset($_POST["submit_file"])) {
                $file = "excel/" . $_FILES["file"]["name"];
                $file_open = fopen($file, "r");
                $_SESSION["file"] = $file;
                fgets($file_open);  // read one line for nothing (skip header)
                while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                    $title = $csv[0];
                    $first_name = $csv[1];
                    $middle_name = $csv[2];
                    $family_name = $csv[3];
                    $sex = $csv[4];
                    $username = $csv[5];
                    $email = $csv[6];
                    $student_id = $csv[7];
                    $fan = $csv[8];
                    ?> 
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $first_name; ?>
                    </td>
                    <td>
                        <?php echo $middle_name; ?>
                    </td>
                    <td>
                        <?php echo $family_name; ?>
                    </td>
                    <td>
                        <?php echo $sex; ?>
                    </td>
                    <td>
                        <?php echo $username; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <?php echo $student_id; ?>
                    </td>
                    <td>
                        <?php echo $fan; ?>
                    </td>
                </tr>

                <?php
                //mysql_query("INSERT INTO employee VALUES ('$name','$age','country')");
            }
        }
        ?>
    </table>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <input type="submit" value="Confirm" name="confirm_submit" class="confirmbtn">
    </form>
    <?php
    $today = date('Y-m-d H:i:s');
    if (isset($_POST["confirm_submit"])) {
        if (include 'DBconnect.php') {
            $file = $_SESSION["file"];
            $file_open = fopen($file, "r");
            fgets($file_open);  // read one line for nothing (skip header)
            while (($csv = fgetcsv($file_open, 200, ",")) !== false) {
                $title = $csv[0];
                $first_name = $csv[1];
                $middle_name = $csv[2];
                $family_name = $csv[3];
                $gender = $csv[4];
                $username = $csv[5];
                $email = $csv[6];
                $student_id = $csv[7];
                $fan = $csv[8];
                $uploader = $_SESSION["username"];
                $sql = "INSERT INTO users (role_id, title, first_name, middle_name, family_name, gender, username, password, email_address, student_id, FAN,creted_date, created_by, last_modified_date, last_modified_by) "
                        . "VALUES ('3','$title','$first_name','$middle_name','$family_name','$gender','$username','" . md5($username) . "','$email','$student_id','$fan','$today','$uploader','$today','$uploader')";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        echo "Upload completed";
        header('refresh:5; url=moduleManage.php');
    }
    ?>