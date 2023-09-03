<?php
	session_start();
		$_SESSION['stu_logged_in'] = false;
		$_SESSION['fac_logged_in'] = false;
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Student Faculty Portal: LogOut</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="../js/jquery.min.js"></script>
		
		<link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<link href="../css/template.css" rel="stylesheet">
		
		<style>
			button
			{
				border-radius: 20px;
				border: 1px solid #FF4B2B;
				background-color: #FF4B2B;
				color: #FFFFFF;
				font-size: 21px;
				font-weight: bold;
				padding: 12px 45px;
				letter-spacing: 1px;
				text-transform: uppercase;
				transition: transform 80ms ease-in;
			}
		</style>
    </head>

	<body>
		<?php
            require 'LogOutMenu.php';
        ?>
		
		<div style="color: white; text-align: center; font-size: 36px;">
				<h2>Thanks for visiting !!!</h2>
				<center>
				<?php
				if(isset($_SESSION['message']) AND !empty($_SESSION['message']))
				{
					echo $_SESSION['message'];
				}
				?>
				<p>You have been succesfully logged out !!!</p>
				<div class="6u 12u$(xsmall)">
				<br>
				<button type="button"><a style="text-decoration:none; background:none;" href="../index.php" class="button special">HOME</a></button>
				</div>
				</center>
		</div>
	</body>
</html>
