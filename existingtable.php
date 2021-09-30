<?php
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}
include 'database.php';
$q="select tablename from usertable where username='".$_SESSION['user']."' and type='attendance'";
$q2=mysqli_query($con,$q);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <title>Classregister - ExistingTable</title>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        
        function display(){
           swal("Data saved successfully!", "To view table, go to My Records-->Attendance", "success");
        }
        function displayerror(){
            swal("", "You have already created a column with this date in the table", "warning");
        }
    </script>
    
    <style>
    #attendance{
        width:100%;
    }
        @media only screen and (max-width: 600px) {
  #attendance {
    width:100%;
    height:660px;
  }
  #jattend{
      margin-top:50px;
      height:400px;
  }
}
    </style>
</head>

<body >
  
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
    <div id="attendance">
        <div class="jumbotron text-center" id="jattend"style="background: rgba(255,255,255,0.5);">
            <h3 id="savingdataheader" style="font-family: ABeeZee, sans-serif;">Saving data to existing table</h3>
            <form method="POST">
            <p style="font-family: ABeeZee, sans-serif;font-size: 18px;">Which table would you like to save it to?&nbsp; &nbsp; &nbsp;&nbsp;
                <select id="choosetable" name="choosetable" required style="width:100px;">
                <?php
                    while($rows=mysqli_fetch_array($q2)){
                        
                        $name=str_replace($_SESSION['user']."_","",$rows['tablename']);
                ?>
                <option value="<?php echo $rows['tablename']; ?>"><?php echo $name; ?></option>
                <?php

                    }                    
                ?>
            </select></p>
           
            <p id="selectdate" style="font-size: 18px;font-family: ABeeZee, sans-serif;">Select the date of attendance&nbsp; &nbsp; &nbsp;&nbsp;<input type="date" name="date"></p><input class="btn btn-primary" type="submit" name="save" value="Save" style="text-align: center;font-family: ABeeZee, sans-serif;">
            
        </div>
    </div>
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>
<?php
if(isset($_POST['save'])){
    $username=$_SESSION['user'];
    $tablename=$_POST['choosetable'];
    $a=strtotime($_POST['date']);
    $b=getdate($a);
    $mday=$b['mday'];
    $month=$b['month'];
    $getd="select ".$mday."_".$month." from ".$tablename;
    if(!(mysqli_query($con,$getd))){
    $allstudents=$_SESSION['allstudents'];
    $absentees=$_SESSION['absentees'];

    $q="alter table ".$tablename." add ".$mday."_".$month." char(1) default 'P'";
    mysqli_query($con,$q);
//echo $q;
if(mysqli_query($con,$q)){
    //echo "done 108";
}
//print_r($allstudents);
//print_r($absentees);
    $s="";
    for($i=0;$i<count($allstudents);$i++){
        
        if(in_array($allstudents[$i], $absentees)){
            
            $s ="update ".$tablename." set ".$mday."_".$month."='A' where Name='".$allstudents[$i]."'";
            //echo $s;
            mysqli_query($con,$s);
            
            
        }
        

    }
    echo "<script>display();</script>";
}
else{
    echo "<script>displayerror();</script>";
}
}

?>
</html>