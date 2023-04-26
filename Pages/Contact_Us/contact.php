<?php

include '../../Administrator/Database/config.php';
// Check if form was submitted

session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Get input values
   $lastname = $_POST["lastname"];
   $firstname = $_POST["firstname"];
   $phone = $_POST["phone"];
   $email = $_POST["email"];
   $message = $_POST["message"];

   // Prepare SQL statement to insert data into "inquiries" table
   $stmt = $conn->prepare("INSERT INTO inquiries (lastname, firstname, phone, email, message) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $lastname, $firstname, $phone, $email, $message);

   // Execute SQL statement
   if ($stmt->execute()) {
      // Success message
      echo "Thank you for your suggestion!";
   } else {
      // Error message
      echo "Error: " . $stmt->error;
   }

   // Close statement
   $stmt->close();
}

// Close connection
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="contact.css" />
   <link rel="icon" type="image/x-icon" href="../photos/WMA.png">
   <script src="contact.js"></script>
   <title>TEMPLATE</title>
</head>

<body>
   <nav class="navbar" id="myNavBar">

      <div class="logo_holder">
         <a class="nav_logo" href="https://westmigrationagency.com/">
            <img src="../../Photos/wma-logo.png" />
         </a>
      </div>

      <div class="link_holder" id="link_holder">
         <div class="nav_links">
            <a href="#">News</a>
         </div>

         <div class="nav_links dropdown">
            <button class="dropbtn">Process</button>
            <div class="dropdown-content">
               <a href="../Process/process_FamBased.html">Family Based</a>
               <a href="../Process/process_StudEx.html">Study and Exchange</a>
               <a href="../Process/process_TempEmp.html">Temporary Employment</a>
            </div>
         </div>

         <div class="nav_links dropdown">
            <button class="dropbtn">Categories</button>
            <div class="dropdown-content">
               <a href="../Forms/Categories/Family_Based/FB_Eligibility.php">Family Based</a>
               <a href="../Forms/Categories/Study_Exchange/SE_Eligibility.php">Study and Exchange</a>
               <a href="../Forms/Categories/Temporary_Employment/TE_Eligibility.php">Temporary Employment</a>
               <a href="../Forms/Categories/">Other Uploads</a>
            </div>
         </div>

         <div class="nav_links">
            <a href="../About_Us/about.html">About Us</a>
         </div>
      </div>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i>
      </a>
   </nav>

   <!-- ------------------------------------ -->

   <!-- CONTENT -->
   <div class="container">
      <header>
         <div class="content_title">
            <h1>Connect with US!</h1>
         </div>
      </header>
      <section>
         <div class="content">
            <div class="left">
               <div>
                  <p>Company Number: 415-633-6865</p>
               </div>
               <div>
                  <p>Company Email: admin@westmigrationagency.us</p>
               </div>
               <div class="form">
                  <h1>FOR INQUIRIES, PLEASE FILL UP FORM BELOW.</h1>
                  <form method="post">
                     <input required type="text" id="lastname" name="lastname" placeholder="Last Name:" />
                     <input required type="text" id="firstname" name="firstname" placeholder="Last Name:" />
                     <input required type="text" id="phone" name="phone" placeholder="Last Name:" />
                     <input required type="email" id="email" name="email" placeholder="Last Name:" />
                     <textarea id="message" name="message" placeholder="Message">
                     </textarea>
                     <input class="submit" type="submit" value="Submit" style="cursor: pointer;">
                  </form>
               </div>
            </div>
            <div class="right">
               <div class="gmap_canvas">
                  <iframe width="100%" height="90%" id="iframe"
                     src="https://maps.google.com/maps?q=3400%20COTTAGE%20WAY%20STE,%20CA%2095825&t=&z=13&ie=UTF8&iwloc=&output=embed"
                     frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                  </iframe>
                  <a href="https://fmovies-online.net"></a>
                  <br />
                  <a href="https://www.embedgooglemap.net"> </a>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- CONTENT END -->


   <!-- ! ------------------------------------- -->

   <!-- FOOTER BAR SECTION [START] -->
   <footer>
      <div class="footer_container">

         <!-- LOGO SECTION [ START ] -->
         <div class="logo_container">
            <a href="https://westmigrationconsultancy.com/">
               <img src="../../Photos/wma-logo.png" />
            </a>
            <p>© 2023 West Migration Agency All Rights Reserved</p>
            <p>
               West Migration Agency LLC (“WMA”) is the parent company of West Migration Consultancy Inc.,(“WMC”) based
               in the Philippines. WMC and its state affiliates advance the corporation's interest to engage in
               immigration consultancy by providing expert advice to prospective clients for the USA through
               qualification assistance, processing of applications, and other related documents.
            </p>
         </div>
         <!-- LOGO SECTION [ END ] -->

         <!-- CONTACTS SECTION [ START ] -->
         <div class="contact_info">
            <div class="contact_info_left">
               <i id="icon1" class="fa-solid fa-location-dot"></i>
               <i id="icon2" class="fa-solid fa-envelope"></i>
               <i id="icon3" class="fa-solid fa-phone"></i>
               <i id="icon4" class="fa-solid fa-link"></i>
            </div>
            <div class="contact_info_right">
               <p class="address">3400 Cottage Way STE. G2 #11495 Sacramento, CA 95825</p>
               <p class="e-mail">admin@westmigrationagency.us</p>
               <p class="phone">415-633-6865</p>
               <a href="admin/login/login.php">ADMIN</a>
            </div>
         </div>
         <!-- CONTACTS SECTION [ END ] -->

         <!-- PAGE SECTION LINKS [ START ] -->
         <div class="about_links">
            <h3 class="about_title">About Us</h3>
            <div class="about_links_container">
               <a class="company_links" href="about/about.html">
                  Our Company
               </a>
               <a class="company_links" href="about/about.html#mission_start">
                  Our Mission
               </a>
               <a class="company_links" href="about/about.html#specialization_start">
                  Our Specializations
               </a>
            </div>
         </div>
         <div class="about_links">
            <h3 class="about_title">Processes</h3>
            <div class="about_links_container">
               <a class="company_links" href="process/process.html">
                  Consultation Process
               </a>
               <a class="company_links" href="process/process.html#timeline_start">
                  Timeline of Application
               </a>
               <a class="company_links" href="process/process.html#howto_start">
                  How-To Apply
               </a>
            </div>
         </div>
         <!-- PAGE SECTION LINKS [ START ] -->

         <!-- SOCIAL MEDIA LINK SECTION [ START ] -->
         <div class="socials">
            <div class="socials-container">
               <div>
                  <a href="https://www.facebook.com/profile.php?id=100087001537840" id="socialButton1">
                     <i class="fa-brands fa-facebook-f"></i>
                  </a>
               </div>
               <div>
                  <a href="#" id="socialButton2">
                     <i class="fa-brands fa-instagram"></i>
                  </a>
               </div>
               <div class="email_button">
                  <button id="socialButton3" onclick="copyToClipboard()">
                     <i class="fa-solid fa-envelope"></i>
                  </button>
               </div>
            </div>
         </div>
         <!-- SOCIAL MEDIA LINK SECTION [ END ] -->
      </div>
   </footer>
   <!-- FOOTER BAR SECTION [END] -->
</body>

</html>