<!--A Design by OGWE CHINENYE EDITH
Author: OGWE CHINENYE EDITH
-->
<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$department = mysql_real_escape_string($_POST['department']);
	$faculty = mysql_real_escape_string($_POST['faculty']);
	$level = mysql_real_escape_string($_POST['level']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	$department = trim($department);
	$faculty = trim($faculty);
	$level = trim($level);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(user_name,department,faculty,level,user_email,user_pass) 
			VALUES('$uname','$department','$faculty','$level','$email','$upass')"))
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

<!DOCTYPE HTML>
<html>
<head>
	<title>e-Learning</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/login_style.css" type="text/css" />
</head>
<body>

<?php include_once('include/navigation.php'); ?>

<div class="main_bg">
<div class="wrap">
<div class="wrapper">
	<div class="main1">
			<div class="grid_1_of_2 images_1_of_2">
				<h2 class="style">Login Here</h2>
				
				<div id="login-form">
					<form method="post">
					<table align="center" width="100%" border="0">
					<tr>
					<td><input type="text" name="uname" placeholder="User Name" required /></td>
					</tr>

					<!--<tr>
					<td><input type="text" name="course" placeholder="Course" required /></td>
					</tr>-->

					<!--<tr>
					<td><input type="text" name="level" placeholder="Level" required /></td>
					</tr>-->
					
					<tr>
			    		<td>
			    			<select name="department" style="height: 43px; width:97%; border-radius:3px; 
			    			border:solid #e1e1e1 1px; font-family:Verdana, Geneva, sans-serif; font-size:16px;
							background:#f9f9f9; transition-duration:0.5s; box-shadow: inset 0px 0px 1px rgba(0,0,0,0.4)">
						        <?php
						           include_once("config.php");
						        $query1="SELECT * FROM department ORDER BY id ASC";
						        $result1 = mysql_query ($query1, $connect);
						        echo "<option value=\"\">Choose One Out of the Department</option>";
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
			    			<select name="faculty" style="height: 43px; width:97%; border-radius:3px; 
			    			border:solid #e1e1e1 1px; font-family:Verdana, Geneva, sans-serif; font-size:16px;
							background:#f9f9f9; transition-duration:0.5s; box-shadow: inset 0px 0px 1px rgba(0,0,0,0.4)">
						        <?php
						           include_once("config.php");
						        $query1="SELECT * FROM faculty ORDER BY id ASC";
						        $result1 = mysql_query ($query1, $connect);
						        echo "<option value=\"\">Choose One Out of the faculty</option>";
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
			    			<select name="level" style="height: 43px; width:97%; border-radius:3px; 
			    			border:solid #e1e1e1 1px; font-family:Verdana, Geneva, sans-serif; font-size:16px;
							background:#f9f9f9; transition-duration:0.5s; box-shadow: inset 0px 0px 1px rgba(0,0,0,0.4)">
						        <?php
						           include_once("config.php");
						        $query1="SELECT * FROM classes ORDER BY id ASC";
						        $result1 = mysql_query ($query1, $connect);
						        echo "<option value=\"\">Choose One Out of the Level</option>";
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
					<td><input type="email" name="email" placeholder="Your Email" required /></td>
					</tr>
					<tr>
					<td><input type="password" name="pass" placeholder="Your Password" required /></td>
					</tr>
					<tr>
					<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
					</tr>
					<tr>
					<td><a href="student.php">Sign In Here</a></td>
					</tr>
					</table>
					</form>
				</div>

			</div>
			<div class="grid_1_of_2 images_1_of_2 img_style">
				<img src="images/pic3.jpg" alt="">
			</div>
			<div class="clear"></div>
	</div>
</div>
</div>
</div>

	<?php include_once('include/footer.php'); ?>

</body>
</html>