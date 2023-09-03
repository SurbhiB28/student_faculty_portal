<?php
	session_start();
	require 'db.php';
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true OR isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
?>

<?php
	require 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$Name = $_POST['name'];
		$Roll = $_POST['roll'];
		$Course = $_POST['course'];
		$Message = $_POST['message'];
		$Faculty = $_POST['faculty'];

		$sql = "INSERT INTO query (name, broll, bcourse, faculty, message)
			   VALUES ('$Name', '$Roll', '$Course', '$Faculty', '$Message')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$_SESSION['message'] = "Unable!!!";
			header("Location: Login/error.php");
		}
		else {
			$_SESSION['message'] = "Query submitted!!!";
            header("location: Login/success.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Faculty Portal</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		<link href="css/template.css" rel="stylesheet"> 
		<link href="css/book-view.css" rel="stylesheet">
		<link href="css/stdnt-pro-view.css" rel="stylesheet">
		<link href="css/table.css" rel="stylesheet">
		
		<style>
		input
		{
			background-color: #a22525;
			border: none;
			padding: 12px 6px;
			margin: 7px 199px;
			z-index: 2;
			width: 100%;
		}
		</style>
	</head>
	<?php
		if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true) {
	?>
	<body>
		<?php 
			require 'Login/FacultyMenu.php';
		?>
		
		<!-- One -->
		<h2 style="margin-top:5%; color: white;text-align: center;font-size: 40px;">Submitted Queries:</h2>
		
		<?php
			$faculty = $_SESSION['Name'];
			$sql = "SELECT * FROM query WHERE faculty='$faculty'";
			$result = mysqli_query($conn, $sql);
		?>
		
		<?php
			while($row = $result->fetch_array()):
		?>
		
		<table>
			<tr>
			<th>Name</th>
			<th>Roll No.</th>
			<th>Course</th>
			<th>Message</th>
			</tr>
			<tr>
			<td><?php echo $row['name'].'';?></td>
			<td><?php echo $row['broll'].'';?></td>
			<td><?php echo $row['bcourse'].'';?></td>
			<td><?php echo $row['message'].'';?></td>
			</tr>
		</table>
		
		<?php
			endwhile;
		?>
		<br>
		</section>
	</body>
	<?php 
		} else if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true) {
	?>
	<body>
		<?php
			require 'Login/StudentMenu.php';
		?>
		<!-- One -->
		<form class="modal-container" method="POST" action="query.php" enctype="multipart/form-data" style="background: black; text-align: center;color: white;opacity: 0.6;">
		<h2>Enter your query!!</h2>
		<div class="row">
			<div class="col-sm-6">
				<input type="text" name="name" id="name" value="<?php echo $_SESSION['Name'];?>" readonly/>
				<br>
				<input type="text" name="roll" id="roll" value="<?php echo $_SESSION['Roll No.'];?>" readonly/>
				<br>
				<input type="text" name="course" id="course" value="<?php echo $_SESSION['Course'];?>" readonly/>
				<br>
				<input type="text" name="message" id="message" value="" placeholder="Enter Your Message here!!!"/>
				<br>
				<label style="margin-top: 10%;margin-left: 50%;position: absolute;"for="faculty">Send To:</label>
				<select id="faculty" name="faculty"  required style="position: absolute;top: 70%;margin: 8px 350px;background-color: red;font-weight: 800;">
				<?php 
					$sql = "SELECT * FROM faculty WHERE 1";
					$result = mysqli_query($conn, $sql);
					while($row = $result->fetch_array()):
				?>
					<option value="<?php echo $row['fname']; ?>"><?php echo $row['fname']; ?></option>
				<?php
					endwhile;
				?>
				</select>
				<button type="submit" style="font-size: 22px;margin: 10px 300px;margin-top: 30%;}">Submit</button>
			</div>
		</div>
		</form>
	</body>
	<?php } ?>
</html>
<?php 
	}
	else
	{
	$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>