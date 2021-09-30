<?php
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - Attendance</title>
    <meta name="robots" content="noindex, nofollow"/>
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
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    
    </script>
    <script src='https://unpkg.com/tesseract.js@v2.0.2/dist/tesseract.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

    function showit(){
        swal({
  text: "Do you want to save data to an existing table?",
  
  icon: "info",
  buttons: ['No, create a new table', 'Yes']
})
.then((willDelete) => {
  if (willDelete) {
    location.href='existingtable.php';
  } else {
    location.href='createtable.php';
  }
});      
    }
    
function create(){
    location.href='createtable.php';
}
    function tess(a){
  //   var d = new Date();
  // d.setTime(d.getTime() + (6*1000));
  // var expires = "expires=" + d.toGMTString();
  //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
Tesseract.recognize(
            a,
            'eng',
            { logger: m => console.log(m) }
        ).then(({ data: { text } }) => {
            textt= text;
            textt=textt.split("\n").join(" ");
            var x=encodeURIComponent(btoa(unescape(encodeURIComponent(textt))));
            window.location.href= window.location+"?q="+x;


        //     document.cookie = "newdata = AND THIS SHOULD WORK ;"+expires+  ";path=/";
        //     console.log(textt);
            

        // })
      
 })}

</script>

<style type="text/css">
    #cont{
        max-width: 100%;

    }

</style>
  <style>
    @media only screen and (max-width: 600px) {
  #jumboattendance2 {
    width: 100%;
  }
  #cont {
    width: 100%;
  }

}
</style>
</head>

<body>
<?php
$list2=$_SESSION['allstudents'];
//print_r($list2);
//$contents=base64_decode($_GET['q']);
$contents=$_GET['q'];

$absentees=array();
if((!empty($list2))&&(!empty($contents))){
for($x=0; $x<count($list2); $x=$x+1){
   
        
        if(strpos(strtolower($contents), strtolower($list2[$x]))){
            $count=$count+1;
          
            
        }
    
    if($count==0){
        array_push($absentees,$list2[$x]);
        
    }
    else{
        $count=0;
    }

}
}


$_SESSION['absentees']=$absentees;




?>



    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="font-family: Amita, cursive;color: var(--dark);">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="color: var(--dark);font-family: Amita, cursive;">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="font-family: Amita, cursive;color: var(--white);background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <!-- Start: 1 Row 2 Columns -->
    <div class="container" id="cont" style="text-align: left; height:600px">
        <div class="jumbotron" id="jumboattendance2">
            
            <p style="font-family: Amita, cursive;font-size: 32px;">Attendance</p>
            <div class="row">
                <div class="col-md-6 offset-lg-1">
                    <p style="font-family: ABeeZee, sans-serif;font-size: 18px;">Names of absentees:</p><br><textarea rows="10" cols="25" style="resize:none; " readonly>
                    <?php 
                    for ($i=0;$i<count($absentees);$i++){
                        echo $absentees[$i]."\n";
                    }
                    ?>
                    </textarea>
                </div>
            </div>
            <br>
            
            <p style="font-family: ABeeZee, sans-serif;font-size: 18px;">If you find any discrepancies in the names of absentees, don't worry, you can edit the records later, after saving it.</p>
        <form method="POST" enctype="multipart/form-data">
            <p class="text-left" style="width: 667px;font-family: ABeeZee, sans-serif;font-size: 18px;">Click here to save this data for future reference:<input  type="submit" class="btn btn-primary"  value="Save" name="save"></p>
            
        </form>
        </div>
    </div><!-- End: 1 Row 2 Columns -->
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
<?php
include 'database.php';

$username=$_SESSION['user'];
if(isset($_POST['save'])){
   
    
$q="select count(*) from usertable where username='".$username."' and type='attendance'";

$q2=mysqli_query($con,$q);
$q3=mysqli_fetch_array($q2);
$count=0;

    $count=$q3['count(*)'];


if($count==0){
    //echo "count is 0";
    echo "<script type='text/javascript'>create();</script>";
}
if($count!=0){
   
     echo "<script type='text/javascript'>showit();</script>";
}

}

?>