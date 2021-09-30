<?php
include 'database.php';
session_start();
$username=$_SESSION['user'];
if(empty($username)){
    header("location:index.php");
}
$fr="select count(*) from usertable where username='".$username."' and type='form'";

$fr2=mysqli_query($con,$fr);

$count=mysqli_fetch_array($fr2);
if(!empty($count)){
$count2=$count['count(*)']+1;
}
else{
    $count2=1;
}
$quizz=$username."_form".$count2;


/*while($rows=mysqli_fetch_array($fr2)){
    $fr3=$rows['tablename'];
    echo "ent in array :- ".$fr3;
    $fr3=str_replace($username."_form", "", $fr3);

$n=intval($fr3)+1;
$quizz=$username."_form".$n;
}
*/



$w="create table ".$quizz." (Q_no int(3) primary key auto_increment,type varchar(8), contents varchar(400), points tinyint(4))";

$token=random_bytes(10);
$token2=bin2hex($token);
$w2="insert into usertable(type,tablename,username,token) values('form','".$quizz."','".$username."','".$token2."')";

//$quizname=openssl_encrypt($quizz, 'AES-128-ECB', "SECRET");
//echo $quizz;
 $size="select sum(round(((data_length + index_length) /1024 /1024),2)) 'size' from information_schema.TABLES where table_schema='mydatabase' and table_name in (select tablename from usertable where username='".$username."')";
//$size2=mysqli_query($con,$size);
$size4=0.0;
if(mysqli_query($con,$size)){
$size3=mysqli_fetch_array($size2);

$size4=$size3['size'];
}
$_SESSION['size']=$size4;
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <title>Classregister - Homepage</title>
    <meta name="robots" content="noindex, nofollow"/>
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
    <!--<link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/untitled.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <style type="text/css">
       .s{
        color: blue;
        background: transparent;
        border-radius: 2px;
        border-color: white;
       }
       #homepageimage {
  width: 500px;
  height: 350px;
  margin-top: 20px;
}
@media only screen and (max-width: 600px) {
  #homepageimage {
    width: 100%;
    height:300px;
  }
 
}
#homepagecontainer{
    max-width: 100%;
    
}
#homepagecontainer {
  background: linear-gradient(38.99deg, #958ff2 2.04%, #FFFFFF 25.76%);
}
#homejumbo {
  margin-top: 20px;
  background: rgb(255,255,255,0.75);
}
   </style>
   
     <style>


/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background:linear-gradient(-45deg, #ffffe6, #cc66ff, #23a6d5, #23d5ab);
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
  background:linear-gradient(-45deg, #ffffe6, #cc66ff, #23a6d5, #23d5ab);
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
   <script type="text/javascript">
       function createquiz(af){
        
        location.href="quizcode.php?q="+af;
       }
   </script>
   <script type="text/javascript">
       function display(af){
        
        alert(af);
       }
   </script>
</head>

<body>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;font-size: 22px;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="font-family: Amita, cursive;color: var(--dark);">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="font-family: Amita, cursive;color: var(--purple);background: transparent;"><strong>Sign Out</strong></a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <!-- Start: 1 Row 2 Columns -->
    <div class="container" id="homepagecontainer">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron" id="homejumbo">
                    <form method="POST" enctype="multipart/form-data">
                    <p style="font-family: Amita, sans-serif; font-size: 24px;">Attendance</p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To take new attendance&nbsp;<a href="<?php echo 'attendance.php'; ?>">click here</a>&nbsp;</p>
                    <p style="font-family: Amita, sans-serif; font-size: 24px;">Quiz</p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To create a new quiz&nbsp;<button type="submit" name="submit"  class="s">click here</button>&nbsp;</p>
                    <p style="font-family: Amita, sans-serif;font-size: 24px;">Tables</p>
                    <p></p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To create and edit tables of the responses&nbsp;<a href="Myrecords.php">click here</a>&nbsp;</p>
                </form>
                </div>
            </div>
            <div class="col-lg-4"><img id="homepageimage" src="assets/img/Login.png" /></div>
        </div>
    </div><!-- End: 1 Row 2 Columns -->
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
    <button class="open-button" onclick="openForm()" style="font-family: Actor;">Chat</button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <h3 style="font-family: Actor;"><?php echo "Hi ".$username."!"; ?></h3>
<h5 style="font-family: Actor;">How may we help you?</h5>
<br>
<button type="button" class="collapsible">What do I have to do to take attendance?</button>
<div class="content">
  <p>You need just two files to start with it.</p>
  <p>1. A .txt file that contains the names of students</p>
  <p>2. A screenshot of the list of participants in the meeting.</p>
  <p>That's it! Now, simply click on the link to your left and leave the rest to us.</p>
</div>
<button type="button" class="collapsible">Where do I find the attendance that I saved?</button>
<div class="content">
  <p>Go to My Records. Under Attendance section, you will find all your saved attendances.</p>
</div>
<button type="button" class="collapsible">Where do I find the quiz that I saved?</button>
<div class="content">
  <p>Go to My Records. Under Quiz section, you will find all your saved quizzes.</p>
</div>
  <button type="button" class="collapsible">Other</button>
<div class="content">
  <p>If you face any other issues, please contact us at contact@classregister.in. We'll revert back to you within 48 hours.</p>
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
</html>
<?php
if(isset($_POST['submit'])){
    mysqli_query($con,$w);
    mysqli_query($con,$w2);
     
    //echo "<script>display('".$quizz."');</script>";
    echo "<script type='text/javascript'>createquiz('".$token2."');</script>";

}

?>