<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <title>Classregister - Signup</title>
    
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
   <!-- <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    
    <script type="text/javascript">
        function showverif(){
           swal("Verification link sent!","Please click on the link to verify your email ID","info");
        }
    </script>
    
     <style>


/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background:linear-gradient(-45deg, #ffffe6, #004de6, #23a6d5, #23d5ab);
  background-size: 400% 400%;

  animation: gradient 18s ease infinite;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 1;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 10% 50%;
  }
}
/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}


/* Add a red background color to the cancel button */
.form-container .cancel {
  background:linear-gradient(-45deg, #ffffe6, #004de6, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 1;
  
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>

<body>
    <!-- Start: Navigation with Button -->
    <nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><a class="nav-link" href="index.php" type="button"style="font-family: Amita, cursive;color: var(--light);font-size: 18px;background: transparent; color: var(--purple); border-radius: 2px;border-color: var(--purple);"><strong>Log In</strong></a></div>
    </nav><!-- End: Navigation with Button -->
    <!-- Start: 1 Row 2 Columns -->
    <div class="container" id="signupcontainer">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron" id="signupjumbo" style="background-color: transparent;"><img id="signupimage" src="assets/img/Group%2025.jpg" style="width: 350px; height: 300px;margin-top: 150px;" /></div>
            </div>
            <div class="col-md-6" style="background: white;">
                <!-- Start: Login Form Clean -->
                <section class="login-clean">
                    <form method="post">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><i class="icon ion-ios-navigate" style="border-color: var(--indigo);background: var(--white);color: var(--blue);"></i></div>
                        <div class="form-group"><input class="form-control"  name="username" required placeholder="Username" style="font-family: 'Bree Serif', serif;"><label>Username can have alphabets, numbers and '_'.</label><label>It must start with a letter.</label><input class="form-control" required type="email" id="email" name="email" placeholder="Email" style="font-family: 'Bree Serif', serif;"></div>
                        <div class="form-group"><input class="form-control" type="password" required name="password" placeholder="Password" style="font-family: 'Bree Serif', serif;"></div>
                        <div class="form-group"><button class="btn btn-primary btn-block" id="signupbutton" type="submit" name="signup" style="background: #6C63FF;">Sign Up</button></div>
                    </form>
                    
                </section><!-- End: Login Form Clean -->
            </div>
        </div>
    </div><!-- End: 1 Row 2 Columns -->
     <p class="copyright" style="margin-top:50px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
     <button class="open-button" onclick="openForm()" style="font-family: Actor;">Chat</button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <h3 style="font-family: Actor;">Welcome visitor!</h3>
<h5 style="font-family: Actor;">How may we help you?</h5>
<button type="button" class="collapsible" >Will I have to pay for the services at any point of time?</button>
<div class="content">
  <p>No, the services are free.</p>
</div>
<button type="button" class="collapsible">Is there a subscription involved?</button>
<div class="content">
  <p>No, there's no subscription invloved. All the services are free!</p>
</div>
  <button type="button" class="collapsible">How do I get started?</button>
<div class="content">
  <p>Just SignUp and verify your email ID. After having done that, simply Login and start using the services provided by us.</p>
</div>
<button type="button" class="collapsible">I didn't receive any verification email after SignUp. What should I do?</button>
<div class="content">
  <p>Please check the spam folder of your email account. The settings of your email account might have redirected the verification email to spam.</p>
</div>
<br>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



    
    
</body>
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

include('database.php');
if(isset($_POST['signup'])){

    $user=mysqli_real_escape_string($con,$_POST['username']);
    $user2=str_replace("_", "", $user);
    //echo "user: ".$user;
    if(ctype_alnum($user2)){
        if(!(is_numeric($user[0]))){
    
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password2=mysqli_real_escape_string($con,$_POST['password']);
    $password=password_hash($password2,PASSWORD_BCRYPT);
    $count="";
    $finduser="select username from signup where username='".$user."'";
    $finduser2=array();
    if(mysqli_query($con,$finduser)){
        $a=mysqli_query($con,$finduser);
        $finduser2=mysqli_fetch_array($a);

        print_r($finduser2);
        if(!empty($finduser2)){
            $count=$count."u";
            //echo "ent";
        }
    }
    
    $findemail="select email from signup where email='".$email."'";
    $findemail2=array();
    if(mysqli_query($con,$findemail)){
        $a=mysqli_query($con,$findemail);
        $findemail2=mysqli_fetch_array($a);
        
        if(!empty($findemail2)){
            $count=$count."e";
        }
    }
//echo "c is ".$count;
    if($count=="u"){
        echo "<script> swal('This username is taken. Please choose a different username','','info'); </script>";
    }
    else if($count=="e" or $count=="ue"){
        echo "<script> swal('This email ID is already registered.','If this email ID belongs to you, then please click on the verification link sent to you on this email ID to start using the services.','warning'); </script>";
    }
    else{
        $token=bin2hex(random_bytes(10));
        //$vfcode=bin2hex(random_bytes(4));
        $w="insert into signup values('".$user."','".$email."','".$password."','".$token."','inactive')";
        mysqli_query($con,$w);
      $subject="Verification link";
$body = "<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class='row' style='background-color: #9900cc; height: 30px;text-align:center;'>
<p style='color:white; text-align: center;font-size: 21px;font-family:Amita;'>classregister</p>
</div>
<div class='row'>
  
  
  <p style='font-family:Actor;font-size:20px;margin-top: 15px;'><b>Hi ".$user."!</b></p>
  <p style='font-family:Actor;font-size:18px;'> Welcome to classregister - We're excited to have you here!</p>
  <p style='font-family:Actor;font-size:18px;'>Classregister is a site specifically designed for teachers. The unique solutions offered by us will surely help reduce your workload!  </p>
  <p style='font-family:Actor;font-size:18px;'> Let's get started, but before that you need to verify your email ID. Below is the verification link, click on it to verify your email ID.</p>
<p style='font-family:Actor;font-size:18px;'><b>Verification link:</b> https://www.classregister.in/verification.php?t=".$token."
</div>
<div class='row' style='background-color:  #9900cc; height: 25px;margin-top: 50px;'>
  </div>
</body>
</html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Reply-To: contact@classregister.in\r\n";
$headers .= "Return-Path: contact@classregister.in\r\n";
 $headers .= "X-Priority: 1\r\n";
 $headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@classregister.in"."\r\n";

      
        if (mail($email."\r\n", $subject, $body,$headers)) {
    
        echo "<script> showverif(); </script>";
    }
        
    }
}
else
{
    echo "<script type='text/javascript'> swal('Username must not begin with a number','','warning'); </script>";
}

}
else{
    echo "<script>swal('Please do not use any special characters in the username','','warning'); </script>";
}

}



?>
</html>