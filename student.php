<!--A Design by OGWE CHINENYE EDITH
Author: OGWE CHINENYE EDITH
-->

<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
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
				<!--<p class="para top">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. </p>
				<div class="button1">
					<a href="details.php" class="btn btn_s">view More</a>
				</div>-->
				<div id="login-form">
					<form method="post">
						<table align="center" width="100%" border="0">
							<tr>
								<td><input type="text" name="email" placeholder="Your Email" required /></td>
							</tr>
							<tr>
								<td><input type="password" name="pass" placeholder="Your Password" required /></td>
							</tr>
							<tr>
								<td><button type="submit" name="btn-login">Sign In</button></td>
							</tr>
							<tr>
								<td><a href="register.php">Sign Up Here</a></td>
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