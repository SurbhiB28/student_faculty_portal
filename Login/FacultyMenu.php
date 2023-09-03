<?php
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$link = "../FacultyProfileView.php";
	}
	else
	{
		$loginProfile = "Login";
		$link = "../index.php";
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<link href="../css/dropdown.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	<header>
		<div class="menu-toggle" id="hamburger">
			<i class="fas fa-bars"></i>
		</div>
		<div class="overlay"></div>
		<div class="container">
			<nav class="nav_1">
			<h1 class="brand"><a href="/Login/FacultyProfile.php">Student<span>Faculty</span>Portal</a></h1>
			</nav>
			<nav>
				<ul>
					<li><a href="../Login/FacultyProfile.php">Home</a></li>
					<li><a href="<?= $link; ?>"><?php echo" ". $loginProfile; ?></a></li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Books</a>
						<div class="dropdown-content">
						<a href="../UploadBooks.php">Upload Books</a>
						<a href="../Bookmenu.php">Book Menu</a>
						</div>
					</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Notice</a>
						<div class="dropdown-content">
						<a href="../UploadNotice.php">Upload Notice</a>
						<a href="../NoticeMenu.php">Notice Menu</a>
						</div>
					</li>
					<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Attendence/ Marksheet</a>
						<div class="dropdown-content">
						<a href="../UploadMiscell.php">Upload Attendence/ Marksheet</a>
						<a href="../miscMenu.php">Show Attendence/ Marksheet</a>
						</div>
					</li>
					<li><a href="../query.php">Show Queries</a></li>
				</ul>
			</nav>
		</div>
	<section class="content-section">
	</body>
</html>