<?php
include '../../../../Administrator/Database/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $address = $_POST['address'];
   $country = $_POST['country'];
   $phone_number = $_POST['phone_number'];
   $email = $_POST['email'];
   $profession = $_POST['profession'];
   $status = $_POST['status'];
   $file = $_FILES['file']['name'];
   $file_tmp = $_FILES['file']['tmp_name'];
   $foldername = '../../../../Administrator/ApplicantFiles/' . $_POST['lastname'] . ", " . $_POST['firstname'];
   $database_foldername = $_POST['lastname'] . ", " . $_POST['firstname'];


   // Prepared statement for SQL query
   $stmt = $conn->prepare("INSERT INTO form VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("sssssssss", $lastname, $firstname, $address, $country, $phone_number, $email, $profession, $status, $database_foldername);
   if ($stmt->execute()) {
      if (!file_exists($foldername)) {
         mkdir($foldername, 0777, true);
         if (count($_FILES["file"]["name"]) > 0) {
            for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
               $filen = $_FILES["file"]["name"][$i]; //file name
               $path = $foldername . "/" . $filen; //generate the destination path
               if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $path)) { ?>
                  <script>
                     alert("Your submission has been received and is being reviewed by one of our team. We will reach out to you with the next steps! \n\n Thank you again for your interest.");
                     window.location.href = '../../../Contact_Us/contact.php';
                  </script>
                  <?php
               }
            }
         } else {
            echo "<script>alert('Upload the Necessary files!')</script>";
         }
      } else {
         echo "<script>alert('INVALID! \n Response / File has already been recorded.')</script>";
      }
   }
   $stmt->close();
   $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="SE_Eligibility.css">
   <script src="SE_Eligibility.js"></script>
   <link rel="icon" type="image/x-icon" href="../../Photos/WMA.png">
   <title>Interest Form</title>
</head>

<body>
   <!-- NAVIGATION BAR SECTION [ START ] -->
   <nav class="navbar" id="myNavBar">
      <!-- LOGO SECTION [ START ] -->
      <div class="logo_holder">
         <a class="nav_logo" href="https://westmigrationagency.com/">
            <img src="../../../../Photos/wma-logo.png" />
         </a>
      </div>
      <!-- LOGO SECTION [ START ] -->
      <!-- LINKS SECTION [ START ] -->
      <div class="link_holder" id="link_holder">
         <div class="nav_links">
            <a href="../Forms/interest_form.php">Forms</a>
         </div>
         <div class="nav_links">
            <a href="../Process/process.html">Process</a>
         </div>
         <div class="nav_links">
            <a href="../About_Us/about.html">About Us</a>
         </div>
         <div class="nav_links">
            <a href="../Contact_Us/contact.php">Contact Us</a>
         </div>
      </div>
      <!-- LINKS SECTION [ END ] -->
      <!-- BURGER MENU SECTION [ START ] -->
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i>
      </a>
      <!-- BURGER MENU SECTION [ START ] -->
   </nav>
   <!-- NAVIGATION BAR SECTION [ END ] -->

   <!-- ------------------------------------ -->

   <!-- FORM SECTION -->
   <section id="section">
      <div class="container">
         <form name="myForm" action="TE_Eligibility.php" method="post" enctype="multipart/form-data">

            <!-- //! FIRST TAB -->
            <div class="personal_tab" id="personal_tab">

               <label id="personal-info">1. Personal Info *</label>

               <label id="name-title">Name *</label>
               <input type="text" id="lastname" name="lastname" onclick="validate()" onchange="validate()"
                  placeholder="Last Name" />


               <input type="text" id="firstname" name="firstname" onclick="validate()" onchange="validate()"
                  placeholder="First Name" />

               <label id="address-title">Address *</label>
               <input type="text" id="address" name="address" onclick="validate()" onchange="validate()"
                  placeholder="Address" />
               <input type="text" id="country" name="country" onclick="validate()" onchange="validate()"
                  placeholder="Country" />

            </div>

            <!-- //! SECOND TAB -->
            <div class="contact_tab" id="contact_tab">

               <label id="contact-info">2. Contact Info *</label>

               <label id="contact-title">Contacts *</label>
               <input type="text" id="phone_number" name="phone_number" onclick="validate()" onchange="validate()"
                  placeholder="Phone Number" />
               <input required id="email" type="email" name="email" onclick="validate()" onchange="validate()"
                  placeholder="Email Address" />
            </div>
            <div class="interest_tab" id="interest_tab">
               <label id="contact-info">3. Interest Form *</label>
               <label id="contact-title">Current Profession *</label>

               <div class="profession">
                  <select id="profession" name="profession" onclick="validate()"
                     onchange="showfield(this.options[this.selectedIndex].value)">
                     <option value="" disabled selected hidden>Choose Profession</option>
                     <option value="Intern">Intern</option>
                     <option value="Teacher">Teacher</option>
                     <option value="Trainee">Trainee</option>
                     <option value="Physician">Physician</option>
                     <option value="Specialist">Specialist</option>
                     <option value="Au Pair/Educare">Au Pair/Educare</option>
                     <option value="Short-term Scholar">Short-term Scholar</option>
                     <option value="Student: College/University">Student: College/University</option>
                     <option value="Professor or Research Scholar">Professor or Research Scholar</option>
                     <option value="Other" id="other">Other</option>
                  </select>
                  <div id="div1">If Other: <input type="text" name="other_option" id="other_option" onclick="change()"
                        onchange="change()" />
                  </div>
               </div>
               <input type="text" id="status" name="status" value="NEW" hidden>
               <div class="eligibility">
                  <label id="eligibility-title">
                     Do you meet the eligibility requirement for the specific program? *
                     <br>
                     Press "Yes" to proceed.
                  </label>
                  <div class="yes">
                     <input type="radio" id="yes" name="eligible" value="Yes" onchange="submitActivator()"
                        onclick="termsAgree()" disabled>
                     <label for="yes" id="yes_label">YES - If unclickable, please check form.</label>
                  </div>
                  <div class="no">
                     <input type="radio" id="no" name="eligible" value="No" checked onclick="termsAgree()">
                     <label for="no">Not Sure - Refer to Image </label>
                  </div>
               </div>

               <div class="reference">
                  <p>Program Category Requirements</p>
                  <img class="reference_content" src="../../../../Photos/category.jpg">
                  <img class="reference_content" src="../../../../Photos/category2.PNG">
               </div>
            </div>
            <div class="upload_tab">
               <div class="upload" id="upload">
                  <label id="upload-info">4. Document Upload *</label>

                  <label id="valid-title1">
                     !!! The form only accepts .PDF file format input.
                  </label>
                  <label id="valid-title">
                     Resume / Curriculum Vitae *
                  </label>
                  <label for="resume" class="valid-input" id="resume_label">
                     Resume / Curriculum Vitae
                     <input type="file" name="file[]" id="resume" onchange="fileChecker()" accept="application/pdf">

                  </label>

                  <label id="valid-title">Credential Evaluation <br>
                     (if applicable)</label>
                  <label for="credential" class="valid-input" id="credential_label">
                     NACES-approved credential evaluation agency
                     <input type="file" name="file[]" id="credential" onchange="fileChecker()" accept="application/pdf">
                  </label>

                  <label id="valid-title">Reputation and Character <br>(if applicable)</label>
                  <label for="reference" class="valid-input" id="reference_label">
                     Reference letter from a colleague and <br>
                     immediate supervisor
                     <input type="file" name="file[]" id="reference" onchange="fileChecker()" accept="application/pdf">
                  </label>

                  <label id="valid-title">Passport *</label>
                  <label for="passport" class="valid-input" id="passport_label">
                     First Page and Last Page
                     <input type="file" name="file[]" id="passport" onchange="fileChecker()" accept="application/pdf">
                  </label>
               </div>
            </div>
            <div class="privacy_tab">
               <label id="contact-info">5. Privacy Policy *</label>
               <p>
                  Read the Privacy Policy and give permission for West Migration Agency LLC to share my information and
                  discuss my candidacy with any US Sponsors as part of the visa process.
               </p>

               <label id="contact-title">Terms and Conditions *</label>
               <a href="https://docs.google.com/document/d/1WMAgSCGvUyVnzKEelKPdI4RcKVJ5v4KCrGwe4w60PNk/edit">Click And
                  Read!</a>

               <div class="terms">
                  <input type="checkbox" id="terms" name="terms" onchange="validate()"
                     onclick="termsAgree(); submitActivator()">
                  <label> Terms and Conditions *</label>
               </div>

               <div class="submit">
                  <label onmouseover="submitActivator()" for="submit" id="validity_check">If submit button is still
                     disabled, Please check the form's validity!</label>
                  <br>
                  <br>
                  <button type="submit" name="submit" id="submit" disabled
                     onmouseover="submitActivator()">SUBMIT</button>
               </div>
            </div>
         </form>
      </div>
   </section>
</body>

</html>