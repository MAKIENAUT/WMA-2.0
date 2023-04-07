<?php

include "../Database/config.php";

if (isset($_POST['update'])) {
   $status = $_POST['status'];
   $id = $_POST['id'];

   $sql = "UPDATE `form` SET `status`='$status' WHERE `id`='$id'";

   $result = $conn->query($sql);
   if ($result == TRUE) {
      header('Location: ../AdminDisplays/Dashboard/dashboard.php');
   } else {
      echo "Error:" . $sql . "<br />" . $conn->error;
   }
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM `form` WHERE `id`='$id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
         $fullname = $row['lastname'] . ', ' . $row['firstname'];
         $status = $row['status'];
         $id = $row['id'];
      } ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="update.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="welcome.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
         </div>
      </div>
   </nav>
   <!-- ADMIN NAV BAR [END] -->

   <div class="content">
      <div class="content_title">
         <h2>User Update Form</h2>
      </div>
      <form action="" method="post">
         <fieldset>
            <legend>Personal information:</legend>
            <label class="applicant_name">
               Name: <b> &nbsp <?php echo $fullname?></b>
            </label>
            <br />
            <div class="wrapper">
               <input type="hidden" name="id" value="<?php echo $id; ?>">

               <input
                  id="option-1"
                  type="radio" 
                  name="status" 
                  value="NEW" 
                  <?php 
                     if ($status=='NEW' ) {
                        echo "checked" ; 
                     }
                  ?>
               >

               <input 
                  id="option-2"
                  type="radio" 
                  name="status" 
                  value="PENDING" 
                  <?php 
                     if ($status=='PENDING' ) {
                        echo "checked" ; 
                     } 
                  ?>
               >

               <input 
                  id="option-3"
                  type="radio" 
                  name="status" 
                  value="FINISHED" 
                  <?php 
                     if ($status=='FINISHED' ) {
                        echo "checked" ; 
                     } 
                  ?>
               >

               <label for="option-1" class="option option-1">
                  <div class="dot"></div>
                  <span>NEW</span>
               </label>
               <label for="option-2" class="option option-2">
                  <div class="dot"></div>
                  <span>PENDING</span>
               </label>
               <label for="option-3" class="option option-3">
                  <div class="dot"></div>
                  <span>FINISHED</span>
               </label>
            </div>
               
            <input type="submit" value="UPDATE" name="update" />
         </fieldset>
      </form>
   </div>
</body>

</html>
<?php
   } else {
      header('Location: admin.php');
   }
   }
?>