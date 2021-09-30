<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
        <script>
            function myfun(){
                alert( localStorage.getItem("webhits"));
            }
        </script>
    </head>
    <body>
        <form method="POST">
            <button type="submit" value="signup" name="submit">users</button>
            <button  value="webhits" name="submit" onclick="myfun()">webhits</button>
        </form>
    </body>
    
</html>
<?php
include 'database.php';
if(isset($_POST['submit'])){
    
    if($_POST['submit']=='signup'){
        
        $a="select count(*) from signup";
        $b=mysqli_query($con,$a);
        $c=mysqli_fetch_array($b);
        $d=$c['count(*)'];
        print_r($d);
    }
    
}

?>