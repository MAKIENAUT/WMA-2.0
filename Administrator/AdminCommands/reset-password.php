<?php
// Initialize the session
session_start();

// Include config file
require_once "../Database/config.php";
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: ../Login/login.php");
    exit;
}

// Check if user has admin clearance
if ($_SESSION['clearance'] == 'Admin') {
    header('Location: ../Login/login.php');
    exit;
}

// Get the user's username
$username = $_SESSION['username'];
$clearance = $_SESSION['clearance'];
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the old and new passwords from the form
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Check if old password matches the password stored in the database for the user
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($old_password, $password)) {
        // Hash the new password using Bcrypt
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        $stmt->execute();
        $stmt->close();

        // Redirect to the user's profile page
        header('Location: ../Login/login.php');
        exit;
    } else {
        // If old password is incorrect, show an error message
        $error_message = "Incorrect old password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="reset-password.css" rel="stylesheet" type="text/css">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <a href="welcome.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>
    </nav>
    <!-- ADMIN NAV BAR [END] -->
    <div class="container">
        <div class="login_container">
            <h2>Reset Password</h2>
            <?php if (isset($error_message)): ?>
                <p>
                    <?php echo $error_message; ?>
                </p>
            <?php endif; ?>
            <div class="form_proper">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="password" id="form-control" name="old_password" autocomplete="off"
                        placeholder="Old Password" class="form-control 
                            <?php
                            echo (!empty($new_password_err)) ? 'is-invalid' : '';
                            ?>" />
                    <span class="invalid-feedback">
                        <?php echo $new_password_err; ?>
                    </span>

                    <input type="password" id="form-control" name="new_password" placeholder="New Password" class="form-control 
                                <?php
                                echo (!empty($confirm_password_err)) ? 'is-invalid' : '';
                                ?>">
                    <span class="invalid-feedback">
                        <?php echo $confirm_password_err; ?>
                    </span>
                    <div class="actions">
                        <input type="submit" class="submit" value="Submit"
                            onclick="return confirm('Are you sure you want to change your password?')" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>