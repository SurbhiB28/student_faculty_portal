<?php
	session_start();
	require 'db.php';
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true OR isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Book Menu</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap\js\bootstrap.min.js"></script>
		
		<link href="css/template.css" rel="stylesheet">
		<link href="css/table.css" rel="stylesheet">
		
	</head>
	
	<?php
	if(isset($_SESSION['fac_logged_in']) AND $_SESSION['fac_logged_in'] == true) {
	?>
	<body class>
		<?php
		require 'Login/FacultyMenu.php';
		function dataFilter($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		?>

		<!-- One -->
			
		<h2 style="margin-top:5%;color:white;text-align:center;font-size:40px;">Welcome to Notice Menu</h2>
		
		<?php
			$uploader = $_SESSION['Email'];
			$sql = "SELECT * FROM fnotice WHERE fuploader='$uploader'";
			$result = mysqli_query($conn, $sql);
		?>
		
		<?php
			while($row = $result->fetch_array()):
			$docDestination = "uploads/notice/".$row['bdoc'];
		?>
		
		<table>
			<tr>
			<th>Notice Topic</th>
			<th>Notice Description</th>
			<th>Link</th>
			<th>Action</th>
			</tr>
			<tr>
			<td><?php echo $row['name'].'';?></td>
			<td><?php echo "Description : ".$row['noticedesc'];?></td>
			<td><a href="<?php echo $docDestination;?>" style="color:red"/>Click Here</a></td>
			<td><a href="delete-notice.php?id=<?php echo $row["pid"]; ?>" style="color:red"/>Delete</a></td>
			</tr>
			</table>
			<br>

		<?php endwhile;	?>
		<br>
		</section>
	</body>
	<?php 
	} else if(isset($_SESSION['stu_logged_in']) AND $_SESSION['stu_logged_in'] == true)
	{
	?>
	<body class>
		<?php 
			require 'Login/StudentMenu.php';
			function dataFilter($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		
		<!-- One -->
		<h2 style="margin-top:5%;color: white;text-align: center;font-size: 40px;">Welcome to Notice Menu</h2>
		
		<?php
			$course = $_SESSION['Course'];
			$sql = "SELECT * FROM fnotice WHERE 1";
			$result = mysqli_query($conn, $sql);
		?>
		
		<?php
			while($row = $result->fetch_array()):
			$docDestination = "uploads/notice/".$row['bdoc'];
			$user = $row['fuploader'];
			$sql = "SELECT fname FROM faculty WHERE femail='$user'";
			$result1 = mysqli_query($conn, $sql);
			$user2 = $result1->fetch_array();
		?>
		
		<table>
			<tr>
			<th>Notice Topic</th>
			<th>Notice Description</th>
			<th>Link</th>
			<th>Uploaded By:</th>
			</tr>
			<tr>
			<td><?php echo $row['name'].'';?></td>
			<td><?php echo "Description : ".$row['noticedesc'];?></td>
			<td><a href="<?php echo $docDestination;?>" style="color:red"/>Click Here</a></td>
			<td><?php echo $user2['fname'].'';?></td>
			</tr>
		</table>
		
		<?php
			endwhile;
		?>
		<br>
		</section>
	</body>
	<?php } ?>
</html>
<?php 
	} else
	{
	$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>