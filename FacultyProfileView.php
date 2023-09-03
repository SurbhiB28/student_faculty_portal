<?php
    session_start();

	if(!isset($_SESSION['fac_logged_in']) OR $_SESSION['fac_logged_in'] != true)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
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
    </head>


    <body>

        <?php
            require 'Login/FacultyMenu.php';
        ?>

        
        <center>
		<br>
			<h2><?php echo $_SESSION['Name'];?></h2>
			<h4 style="color: white;"><?php echo $_SESSION['Username'];?></h4>
		<br>
		</center>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
			<b><font size="+3" color="white">Email ID : </font></b>
			<font size="+1"><?php echo $_SESSION['Email'];?></font>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<br>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
			<b><font size="+3" color="white">Mobile No : </font></b>
			<font size="+1"><?php echo $_SESSION['Mobile'];?></font>
			</div>
			<div class="col-sm-3"></div>
		</div>
		
		<div class="12u$">
			<center>
			<div class="row uniform">
				<span style="display:block; height:40px;"></span>
				<div>
					<button onclick="document.getElementById('id01').style.display='block'" style="width:auto">Change Password</button>
				</div>
				<span style="display:block; height:30px;"></span>
				<div>
					<button onclick="document.getElementById('id02').style.display='block'" >Edit Profile</button>
				</div>
				<span style="display:block; height:35px;"></span>
				<div >
					<button onclick="logout()" style="width:auto">Log Out</button>
				</div>
			</div>
			</center>
		</div>
		
		<!-- Change Password -->
		
		<div id="id01" class="modal">
			<form class="modal-container_1" style="min-height: 380px;"action="changeFacultyPass.php" method='POST'>
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
			<form class="modal-container_1" action="FacultyprofileEdit.php" method='POST'>
				<div class="imgcontainer">
					<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				
				<div class="container">
					<h3>Edit Profile</h3>
					<form method="post" action="FacultyprofileEdit.php">
						<input type="text" name="newName" id="newName" value="" placeholder=" New Name"/>
						<input type="text" name="newUname" id="newUname" value="" placeholder=" New Username" />
						<input type="text" name="newMobile" id="newMobile" value="" placeholder=" New Mobile Number" />
						<input type="email" name="newEmail" id="newEmail" value="" placeholder=" New Email" />
						<center>
						<input type="submit" value="Submit" />
						</center>
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
	</body>
</html>