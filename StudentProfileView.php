<?php
    session_start();

	if(!isset($_SESSION['stu_logged_in']) OR $_SESSION['stu_logged_in'] != true)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Roll No.']; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="js/jquery.min.js"></script>
		
        <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
        <meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="css/template.css" rel="stylesheet">
		<link href="css/stdnt-pro-view.css" rel="stylesheet">
		<link href="css/student-profile.css" rel="stylesheet">
	
		<style>
			button{
			border-radius: 20px;
			border: 1px solid #FF4B2B;
			background-color: #FF4B2B;
			color: #FFFFFF;
			font-size: 22px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
			margin: 10px 20px 0px 30px;
			}
	
			input {
			color : #1e1a49;
			background-color: #cecece;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
			}
		</style>
	
    </head>


    <body>
	
		<?php
			require 'Login/StudentMenu.php';
		?>
		
		<center>
			<br>
			<h2><?php echo $_SESSION['Name'];?></h2>
			<h4 style="color: white;">Roll No: <?php echo $_SESSION['Roll No.'];?></h4>
			<br>
		</center>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
			<b><font size="+3" color="white">Email ID : </font><font size="+1"></b><?php echo $_SESSION['Email'];?>
			<div class="col-sm-3"></div>
			</div>
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
			<b><font size="+3" color="white">Mobile No : </font></b>
			<font size="+1"><?php echo $_SESSION['Mobile'];?></font>
			</div>
			
			<div class="col-sm-3">
			<b><font size="+3" color="white">Course : </font></b>
			<font size="+3"><?php echo $_SESSION['Course'];?></font>
			</div>
			<div class="col-sm-3"></div>
		</div>
		
		<div class="12u$">
			<center>
			<span style="display:block; height:40px;"></span>
			
			<div>
			<button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto">Change Password</button>
			</div>
			
			<span style="display:block; height:30px;"></span>
			
			<div>
			<button onclick="document.getElementById('id02').style.display='block'" style="width:auto">Edit Profile</button>
			</div>
			
			<span style="display:block; height:35px;"></span>
			
			<div>
			<button type="button" onclick="logout()" style="width:auto">Log Out</button>
			</div>
			</center>
			
		</div>
		
		<!--Student Password Change-->
		<div id="id01" class="modal">
			<form class="modal-container_1" style="min-height: 380px;" action="changeStudentPass.php" method='POST'>
			
				<div class="imgcontainer">
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				
				<div class="container">
					<h3>Change Password</h3>
					<form method="post" action="changeStudentPass.php">
						<input type="password" name="currPass" id="currPass" value="" placeholder="Current Password"  required />
						<input type="password" name="newPass" id="newPass" value="" placeholder="New Password"  required />
						<input type="password" name="conNewPass" id="conNewPass" value="" placeholder="Confirm New Password"  required />
						<center>
						<input type="submit" value="Submit"/>
						</center>
					</form>
				</div>
				
			</form>
		</div>
	
		<!-- Edit Profile -->

		<div id="id02" class="modal">
			<form class="modal-container_1" action="StudentprofileEdit.php" method='POST'>
			
				<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				
				<div class="container">
					<h3>Edit Profile</h3>
					<form method="post" action="StudentprofileEdit.php">
						<div class="row uniform 50%">
						<div class="7u$">
							<input type="text" name="newName" id="newName" value="" placeholder=" New Name"/>
						</div>
						<div class="7u$">
							<input type="text" name="newRoll" id="newRoll" value="" placeholder=" New Roll No." />
						</div>
						<div class="7u$">
							<input type="text" name="newMobile" id="newMobile" value="" placeholder=" New Mobile Number" />
						</div>
						<div class="7u$">
							<input type="email" name="newEmail" id="newEmail" value="" placeholder="New Email" />
						</div>
						<div class="7u$">
							<div class="6u 12u$(xsmall)">
								<select id="newCourse" name="newCourse" required>
									<option value="BCA">BCA</option>
									<option value="BBA">BBA</option>
									<option value="BAM">BAM</option>
							</div>
						</div>
						</div>

						<center>
						<div class="row uniform">
							<div class="7u 12u$(small)">
								<input type="submit" value="Submit" />
							</div>
						</center>
						</div>
					</form>
				</div>

			</form>
		</div>

		<script>
		function logout()
		{
			location.href = "Login/logout.php";
		}
		</script>
		</section>
	</body>
</html>