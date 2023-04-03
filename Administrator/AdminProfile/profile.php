<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
    header("location: ../Login/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="profile.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Profile</title>
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
        <div class="welcome">
            <h1>
                Hi,&nbsp<b> <?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.
            </h1>
        </div>
        <p>What do you want to do?</p>
        <div class="links">
            <a href="../Commands/reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="register.php">Sign up new Admin</a>
        </div>
    </div>
</body>
</html>