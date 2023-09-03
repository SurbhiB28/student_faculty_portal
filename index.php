<?php
	session_start();
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true OR isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
		if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true)
		{
			header("Location: ../Login/FacultyProfile.php");
		}
		if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
		{
			header("Location: ../Login/StudentProfile.php");
		}
	}
?>
<!DOCTYPE html>
<html>

<HEAD>
<title>STUDENT FACULTY PORTAL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<script src="js/jquery.min.js"></script>
<script src= "js/jquery.js"></script>

<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
<script src="bootstrap\js\bootstrap.min.js"></script>
<link href="css\main.css" type="text/css" rel="stylesheet">
		

</HEAD>

<body>

<!-- Content will go here -->
<header>

		<div class="v-header container">
  			<div class="fullscreen-video-wrap">
 				<video src="Video/coverr-female-hands-type-on-laptop-1565793988744.mp4" autoplay="true" loop="True" muted="True"></video>
 				</div>
 				<div class="header-overlay">
 				<div class="header-content">
							<h1 style="font-family: 'Alegreya', serif;">STUDENT FACULTY PORTAL</h1>
 							<h2>Proceed As  </h2>					
							<button type="button" class="btn btn-primary entry" onclick="studentportal()">Student</button>
							<button type="button" class="btn btn-primary entry" onclick="facultyportal()">Faculty</button>
	
                    </div>
 				</div>
			</div>   
</header>

<script>
function studentportal()
{
     location.href = "student.php";
} 

function facultyportal()
{
     location.href = "faculty.php";
} 
</script>


</body>
</html>