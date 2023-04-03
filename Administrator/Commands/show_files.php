<?php 

session_start();
include "../../Administrator/Database/config.php";
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['logged_in'])) {
	header('Location: ../Login/login.php');
	exit;
}

    if (isset($_GET['id'])) {

        $applicant_directory = $_GET['id'];

        $sql = "SELECT * FROM `form` WHERE `id`='$applicant_directory'";

        $result = $conn->query($sql);

        if ($result == TRUE) {

            $msg = '';
            if ($handle = opendir($applicant_directory . "/")) {
                while (false !== ($file = readdir($handle))) {
                    if (($file != '.')&&($file != '..')) {
                        $msg .= '<li><a href="'.$applicant_directory.'/'.$file.'">'.$file.'</a></li>';
                    }
                }
                closedir($handle);
            }

        }else{

            echo "Error:" . $sql . "<br>" . $conn-> $error;

        }

    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="show_files.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Document</title>
</head>
<body>
    <!-- ADMIN NAV BAR [START] -->
    <nav class="nav">
        <div class="nav_container">
            <div class="logo_holder">
                <a id="logo" href="../">
                    <img src="../../Photos/wma-logo.png" id="logo-img">
                </a>
            </div>
            <div class="redirect">
                <a href="admin.php"><i class="fas fa-user-circle"></i>Admin</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>
    </nav>
    <!-- ADMIN NAV BAR [END] -->

    <div class="container">
        <div class="directory">
            <h2>
                FILE MANAGER
            </h2>
        </div>
        <div class="directory">
            <h2>
                list of files in &nbsp<b><?php echo $applicant_directory ?></b>
            </h2>
        </div>
        <div class="file_instances">
        <ul>
            <?php echo $msg ?>
        </ul>

    </div>
    </div>



</body>
</html>

<!-- PUSHED: FILE MANAGER -->