<?php
session_start();
    //error_reporting(0);
    if(!isset($_SESSION['admin'])){
         header("Location: index.php");
    }

include_once 'dbconnect.php';

/*if(isset($_POST['btn-signup']))
{
	$name = mysql_real_escape_string($_POST['name']);
	$admin_id = mysql_real_escape_string($_POST['admin_id']);
	$admin_name = mysql_real_escape_string($_POST['admin_name']);
	$date=date('Y-m-d-H:i:s');
	
	$name = trim($name);
	// email exist or not
	$query = "SELECT name FROM classes WHERE name='$name'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	$_SESSION['admin_id'];
	if($count == 0){
		
		if(mysql_query("INSERT INTO classes(name,datecreated,admin_id,admin_name) VALUES('$name','$date','$admin_id','$admin_name')"))
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
	
}*/
?>

<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>eLearning - Books </title>

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

			<!-- Beginning of form -->
    <form  action="upload_group_material.php" method="post" enctype="multipart/form-data">
    	<table align="center" width="100%" border="0" style="margin-top: 50px;">
    	<tr>
    		<td>
    			<input name="title" type="text" placeholder="Title of Book" required class="form-control form-group" />
    		</td>
    	</tr>

    	<tr>
    		<td>
    			<select name="level" class="form-control form-group">
			        <?php
			           include_once("config.php");
			        $query1="SELECT * FROM classes ORDER BY id ASC";
			        $result1 = mysql_query ($query1, $connect);
			        echo "<option value=\"\">Choose One Out of The Group Listed</option>";
			        //echo "<select name=menu_name value=''>Menu Name</option>";
			        while($menu1=mysql_fetch_array($result1)){
			        $ans = str_replace(" ","",$menu1[name]);
			        //echo "<option value=$ans>$ans</option>";
			        echo "<option value=$ans>".$menu1[name]."</option>";
			        }
			        ?>
    			</select>
    		</td>
    	</tr>

		
		
		<tr>
    		<td>
    			<select name="department" class="form-control form-group">
			        <?php
			           include_once("config.php");
			        $query1="SELECT * FROM department ORDER BY id ASC";
			        $result1 = mysql_query ($query1, $connect);
			        echo "<option value=\"\">Choose One Out of The department</option>";
			        //echo "<select name=menu_name value=''>Menu Name</option>";
			        while($menu1=mysql_fetch_array($result1)){
			        $ans = str_replace(" ","",$menu1[name]);
			        //echo "<option value=$ans>$ans</option>";
			        echo "<option value=$ans>".$menu1[name]."</option>";
			        }
			        ?>
    			</select>
    		</td>
    	</tr>
		
		
		
		<tr>
    		<td>
    			<select name="faculty" class="form-control form-group">
			        <?php
			           include_once("config.php");
			        $query1="SELECT * FROM faculty ORDER BY id ASC";
			        $result1 = mysql_query ($query1, $connect);
			        echo "<option value=\"\">Choose One Out of The faculty</option>";
			        //echo "<select name=menu_name value=''>Menu Name</option>";
			        while($menu1=mysql_fetch_array($result1)){
			        $ans = str_replace(" ","",$menu1[name]);
			        //echo "<option value=$ans>$ans</option>";
			        echo "<option value=$ans>".$menu1[name]."</option>";
			        }
			        ?>
    			</select>
    		</td>
    	</tr>
		
		
		
    	<tr>
    		<td>
    			<input type="file" name="uploaded" id="file" class="ed form-group" id="brnu" />
    		</td>
    	</tr>

    	<tr>
			<td><button type="submit" name="btn-signup" class="btn btn-success btn-lg btn-block">Upload Books Here</button></td>
		</tr>
		</table>
	</form>
		<br/><br/>

			<div>
				<?php
              	/*include("config.php");
                $sql = mysql_query("SELECT * FROM club_material",$connect);
                    if(!$sql){
                        die("Unable to fetch data from databse".mysql_error());
                        }
             	echo "<table border=\"0\" class='table table-hover'>";
             	echo "<thead>";
                echo "<tr>";
                echo "<th>Book Title</th>";
                echo "<th>Level</th>";
				echo "<th>department</th>";
				echo "<th>faculty</th>";
                echo "<th>View</th>";
                echo "<th>Delete</th>";
                echo "</tr>";
                echo "</thead>";
                    while ($result = mysql_fetch_array($sql)){
                echo "<tbody>";
                echo "<tr>";
                echo "<td>".$result['title']."</td>";
                echo "<td>".$result['level']."</td>";
				echo "<td>".$result['department']."</td>";
				echo "<td>".$result['faculty']."</td>";
                echo '<td><a href="'.$result['image'].'" target="_blank">view file</a></td>';
                echo "<td><a href=\"delete.php?id=".$result['id']."\">Delete</a></td>";
                echo "</tr>";
                 echo "<tbody>";
                    }
                 echo "</table>";
				 */
           ?>	

				        <?php
            $connect = mysql_connect("localhost", "root", "");
            $database = mysql_select_db("dbtest", $connect);
            $sql = mysql_query("SELECT * FROM club_material ",$connect);

            echo "<table border=\"0\" width='100%'>";
          
				 while ($result = mysql_fetch_array ($sql))
				{
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Book Title</th>";
					echo "<td style='color:#228B22'>".$result["title"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Level</th>";
					echo "<td style='color:#00BFFF'>".$result["level"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Department</th>";
					echo "<td style='color:#DAA520'>".$result["department"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Faculty</th>";
					echo "<td style='color:#FF0000'>".$result["faculty"]."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Book</th>";
					echo "<td ><a href=\"auth/".$result['image']."\" target=\"_blank\" style='color:#228B22'>Read</a></td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<th style='color: #228B22; width:20%;'>Faculty</th>";
					echo "<td><a href=\"delete.php?id=".$result['id']."\">Delete</a></td>";
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
