<?php
// Create connection
$con = mysqli_connect("localhost", "root", "mudasir", "role");

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if submit button is clicked
if (isset($_POST["submit"])) {
  // Sanitize user input
  $username = mysqli_real_escape_string($con, $_POST["username"]);
  $password = mysqli_real_escape_string($con, $_POST["password"]);

  // Query the database
  $query = mysqli_query($con, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");

  // Check if user exists
  if (mysqli_num_rows($query) > 0) {
    // Start session and set username
    session_start();
    $_SESSION["username"] = $username;

    // Fetch user role
    $row = mysqli_fetch_assoc($query);
    $role = $row['role'];

    // Redirect based on role
    if ($role == 'admin') {
      header("Location: admin.php");
      exit();
    } elseif ($role == "manager") {
      header("Location: manager.php");
      exit();
    } elseif ($role == "employee") {
      header("Location: employee.php");
      exit();
    }
  } else {
    // Display error message
    echo "<h1>Invalid username or password. Please try again!</h1>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

    <!-- Additional Styles -->
    <!-- Add any additional styles or libraries here -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
    </head>
    
  <body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
          <img src="vendors/images/deskapp-logo.svg" alt="" />
       </a>
            </div>
       <div class="login-menu">
                <ul>
    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </div>
    </div><div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
      <div class="row align-items-center">
     <div class="col-md-6 col-lg-7">
<img src="vendors/images/login-page-img.png" alt="" />
     </div>
                <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
          <div class="login-title">
     <h2 class="text-center text-primary">Login To DeskApp</h2>
         </div>
          <!-- Add an onsubmit attribute to the form element -->
          <form method="post" action="" onsubmit="return validateForm()">
                            <div class="input-group custom">
               <!-- Add an id attribute to the input element -->
               <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" required />
          <div class="input-group-append custom">
     <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <!-- Add a span element to display the error message -->
                            <span class="error" id="username-error"></span>
                            <div class="input-group custom">
       <!-- Add an id attribute to the input element -->
       <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="**********" required />
           <div class="input-group-append custom">
       <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <!-- Add a span element to display the error message -->
                            <span class="error" id="password-error"></span>
                            <div class="row pb-30">
        <div class="col-6">
                                    <div class="custom-control custom-checkbox">
           <input type="checkbox" class="custom-control-input" id="customCheck1" />
           <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
          <div class="col-6">
          <div class="forgot-password">
          <a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
         <div class="col-sm-12">
         <div class="input-group mb-0">
          <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
            </div>
            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
             <div class="input-group mb-0">
               <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
             </div>
              </div>
                            </div>
      </form>
                    </div>
     </div>
    </div>
        </div>
    </div>                         
    <!-- welcome modal start -->
   
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <!-- Additional Scripts -->
    <!-- Add the validation script here -->
    <script>
    function validateForm() {
    // get the input elements by id
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // get the error elements by id
    var usernameError = document.getElementById("username-error");
    var passwordError = document.getElementById("password-error");

    // initialize a variable to store the form validity
    var valid = true;

    // check if the username is empty
    if (username.value == "") {
        // display the error message
        usernameError.textContent = "Please enter your username or email";
        // change the border color to red
        username.style.borderColor = "red";
        // set the form validity to false
        valid = false;
    } else {
        // clear the error message
        usernameError.textContent = "";
        // reset the border color to the default
        username.style.borderColor = "";
    }

    // check if the password is empty
    if (password.value == "") {
        // display the error message
        passwordError.textContent = "Please enter your password";
        // change the border color to red
        password.style.borderColor = "red";
        // set the form validity to false
        valid = false;
    } else {
        // clear the error message
        passwordError.textContent = "";
        // reset the border color to the default
        password.style.borderColor = "";
    }

    // return the form validity
    return valid;
}
    </script>

  
    <!-- Additional Scripts -->
    <!-- Add any additional scripts here -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>
