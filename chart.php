<?php
session_start();
include 'database.php';
if(empty($_SESSION['user'])){
    header("location:index.php");
}
$username=$_SESSION['user'];
$table=$_GET['t'];

$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];


$s3="SELECT * FROM ".$tablename;


$q3=mysqli_query($con,$s3);
$q4=mysqli_query($con,$s3);
$column2 = mysqli_fetch_assoc($q3);
$name = array();

$column = array_keys($column2);

$absent =array();

$c = count($column);
while($row= mysqli_fetch_assoc($q4)){
   array_push($name,$row['Name']);
    
    $count=0;
    for($i=1;$i<$c;$i++){
        
        $k=$column[$i];
        
      
	if($row[$k] == 'A'){
		$count++;
	}
    }
    array_push($absent,$count);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart View</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

</head>
<body>
    <canvas id="mychart" width="400" height="500"></canvas>
    <script>
    let absent = 
    <?php echo json_encode($absent); ?>;
    let name =  <?php echo json_encode($name); ?>;
        let delayed;
        let mychart = document.getElementById("mychart").getContext('2d')
        // Chart.defaults.font.size = 16;

        let mychart2 = new Chart(mychart,{
            type:'bar',
            data:{
                labels:name,
                datasets:[{
                    label:'Days Absent',
                    data:absent,
                    backgroundColor:'#4d79ff',
                borderWidth: 1,
                borderColor:'#777',
                hoverBorderColor:'#000'
                }],
               
            },
            options:{
                plugins: {
            title: {
                display: true,
                text: 'Chart View',
                font: {
                        size: 24
                    }
            }
        },
                tooltips:{
                    position:"nearest"
                },
                indexAxis:'y',
                layout: {
                padding: 20
                 },
                 animation: {
                onComplete: () => {
        delayed = true;
          },
      delay: (context) => {
        let delay = 0;
        if (context.type === 'data' && context.mode === 'default' && !delayed) {
          delay = context.dataIndex * 300 + context.datasetIndex * 100;
        }
        return delay;
      },
    },
    }
           
        })
    </script>
</body>
</html>