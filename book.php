<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Welcome - <?php echo $userRow['user_email']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include_once('include/nav.php'); ?>
    <!-- End of Navigation -->


<div class="container-fluid" style="margin-top: 20px;">

        <!-- Left Column -->
        <?php include_once('include/LeftColumn.php'); ?>
        <!--/Left Column-->
  
  
        <!-- Center Column -->
       

        <div class="col-sm-6">
        
            <!-- Alert -->
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Welcome:</strong> <?php echo $userRow['user_name']; ?>
            </div>      
        
            <!-- Articles -->
      
			
			        <?php
            $connect = mysql_connect("localhost", "root", "");
            $database = mysql_select_db("dbtest", $connect);
            $sql = mysql_query("SELECT * FROM club_material ",$connect);

            echo "<table border=\"0\" width='100%'>";
          
				 while ($result1 = mysql_fetch_array ($sql))
				{
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Book Title</th>";
					echo "<td style='color:#228B22'>".$result1 ["title"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Level</th>";
					echo "<td style='color:#00BFFF'>".$result1 ["level"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Department</th>";
					echo "<td style='color:#DAA520'>".$result1 ["department"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Faculty</th>";
					echo "<td style='color:#FF0000'>".$result1 ["faculty"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Book</th>";
					echo "<td ><a href=\"auth/".$result1['image']."\" target=\"_blank\" style='color:#228B22'>Read</a></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th colspan='2'><hr></th>";
					echo "<tr>";
					
					echo "<tr>";
					echo "<th colspan='2'>&nbsp;</th>";
					echo "<tr>";
					
				}
				
            echo "</table>";
			
            ?>


            
        </div>

        <!--/Center Column-->


      <!-- Right Column -->
       <?php include_once('include/RightColumn.php'); ?> 
      <!--/Right Column -->

    </div>
    <!--/container-fluid-->

   <?php include_once('include/footerstd.php');?>

    
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport bug workaround -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <!-- Placeholder Images -->
    <script src="js/holder.min.js"></script>
    
</body>

</html>
