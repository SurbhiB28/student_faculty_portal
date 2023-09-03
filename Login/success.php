<?php session_start();?>
<!DOCTYPE html>

<html>
	<head>
        <title>Student Faculty Portal</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="../js/jquery.min.js"></script>
		
        <link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="../css/template.css" rel="stylesheet" type="text/css">
		
		<style>
			button 
			{
				border-radius: 20px;
				border: 1px solid #FF4B2B;
				background-color: #FF4B2B;
				color: #FFFFFF;
				font-size: 12px;
				font-weight: bold;
				padding: 12px 45px;
				letter-spacing: 1px;
				text-transform: uppercase;
				transition: transform 80ms ease-in;
			}
		</style>
	</head>

	<?php
		if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true) {
	?>
	<body>
	
		<?php
			require '../Login/FacultyMenu.php';
		?>
	
		<h2 style="text-align: center;font-size: 34px;color: white;">Success</h2>
		<p style="text-align:center;font-size: 30px;margin-top: 100px;color: white;font-weight: 800;">
	
		<?php
		if(isset($_SESSION['message']) AND !empty($_SESSION['message']))
		{
			echo $_SESSION['message'];
		}
		else
		{
			header("Location: ../index.php");
		}
		?>
		</p>
		<br>
	</body>
	<?php 
		} else if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true) {
	?>
	<body>
	
		<?php
			require '../Login/StudentMenu.php';
		?>
	
		<h2 style="text-align: center;font-size: 34px;color: white;">Success</h2>
		<p style="text-align:center;font-size: 30px;margin-top: 100px;color: white;font-weight: 800;">
	
		<?php
		if(isset($_SESSION['message']) AND !empty($_SESSION['message']))
		{
			echo $_SESSION['message'];
		}
		else
		{
			header("Location: ../index.php");
		}
		?>
		</p>
		<br>
	</body>
	<?php } ?>
</html>
