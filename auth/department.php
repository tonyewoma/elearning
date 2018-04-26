<?php
session_start();
    //error_reporting(0);
    if(!isset($_SESSION['admin'])){
         header("Location: index.php");
    }

include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$name = mysql_real_escape_string($_POST['name']);
	$admin_id = mysql_real_escape_string($_POST['admin_id']);
	$admin_name = mysql_real_escape_string($_POST['admin_name']);
	$date=date('Y-m-d-H:i:s');
	
	$name = trim($name);
	// email exist or not
	$query = "SELECT name FROM department WHERE name='$name'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	$_SESSION['admin_id'];
	if($count == 0){
		
		if(mysql_query("INSERT INTO department(name,datecreated,admin_id,admin_name) VALUES('$name','$date','$admin_id','$admin_name')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Create Department </title>

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
   	<?php require('include/nav.php'); ?>
	<!-- End of Navigation -->



<div class="container-fluid">

		<!-- Left Column -->
		<?php require('include/left_column.php'); ?>
		<!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-6">
			<form method="post">
			<table align="center" width="100%" border="0" style="margin-top: 50px;">
			<tr>
			<td><input type="text" name="name" placeholder="Department" required class="form-control form-group" /></td>
			</tr>
		<?php
						error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
							$id = $_SESSION['admin'];
							$connect = mysql_connect("localhost", "root", "");
							if (!$connect){
							    die("Unable to connect ".mysql_error());
							}
							$database = mysql_SELECT_db("dbtest", $connect);
							if (!$database){
							    die("SELECT db ".mysql_error());
							}
							//include_once("include/config.php");
							//$sql = mysql_query("SELECT * FROM teacher WHERE Teacher_ID=$id",$connect);
							$sql = mysql_query("SELECT * FROM admin WHERE admin_id=$id",$connect);
							if(!$sql){
							 die("Unable to fetch data from databse".mysql_error());
							}
							$result = mysql_fetch_array($sql);
							?>

							<input type="text" hidden  name="admin_id" value="<?php echo $result['admin_id'];?>">
							<input type="text" hidden  name="admin_name" value="<?php echo $result['admin_name'];?>">
			<tr>
			<td><button type="submit" name="btn-signup" class="btn btn-success btn-lg btn-block">Create Department</button></td>
			</tr>
			
			</table>
			</form>
			<br/><br/><br/>


			<?php
			$connect = mysql_connect("localhost", "root", "");
			$database = mysql_select_db("dbtest", $connect);
			//$admin_id = $_GET['admin_id'];
			$admin_id=$_SESSION['admin_name'];
			$sql = mysql_query("SELECT * FROM department", $connect);
			//$sql = mysql_query("SELECT * FROM  classes, admin WHERE admin_id=admin_name and admin_id=".$_SESSION['admin_name'],$connect);

			echo "<table border=\"0\" class='table table-hover'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>Group Name</th>";
					//echo "<th>Created By</th>";
					echo "<th>DATE REGISTERD</th>";
					echo "<th>Delete</th>";
				echo "</tr>";
			echo "<thead>";

			while ($result1 = mysql_fetch_array ($sql))
			{
				echo "<tbody>";
			    echo "<tr>";
			    echo "<td >".$result1 ["name"]."</td>";
			    //echo "<td >".$result1["admin_name"]."</td>";
			    echo "<td >".$result1["datecreated"]."</td>";
			    echo "<td><a href=\"delete_department.php?id=".$result1['id']."\">Delete</a></td>";
			    echo "</tr>";
			    echo "<tbody>";
			}
			echo "</table>";

			?>
		</div>
		<!--/Center Column-->


	  <!-- Right Column -->
	  	<?php require('include/right_column.php'); ?>
	  <!--/Right Column -->

	</div><!--/container-fluid-->

	<!-- FOOTER -->
	  	<?php require('include/footer.php'); ?>
	<!--/FOOTER -->
	

	
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
