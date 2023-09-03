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
		?>

		<!-- One -->
			
		<h2 style="margin-top:5%;color:white;text-align:center;font-size:40px;">Welcome to Book Menu</h2>
		
		<?php
			$uploader = $_SESSION['Email'];
			$sql = "SELECT * FROM fbook WHERE fuploader='$uploader'";
			$result = mysqli_query($conn, $sql);
		?>
		
		<?php
			while($row = $result->fetch_array()):
			$docDestination = "uploads/books/".$row['bdoc'];
		?>
		
		<table>
			<tr>
			<th>Book Name</th>
			<th>Book Description</th>
			<th>Course</th>
			<th>Link</th>
			<th>Action</th>
			</tr>
			<tr>
			<td><?php echo $row['bookname'].'';?></td>
			<td><?php echo "Description : ".$row['bookdesc'];?></td>
			<td><?php echo "Course : ".$row['bcourse'].'';?></td>
			<td><a href="<?php echo $docDestination;?>" style="color:red"/>Click Here</a></td>
			<td><a href="delete-book.php?id=<?php echo $row["pid"]; ?>" style="color:red"/>Delete</a></td>
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
		?>
		
		<!-- One -->
		<h2 style="margin-top:5%;color: white;text-align: center;font-size: 40px;">Welcome to Book Menu</h2>
		
		<?php
			$course = $_SESSION['Course'];
			$sql = "SELECT * FROM fbook WHERE bcourse='$course'";
			$result = mysqli_query($conn, $sql);
		?>
		
		<?php
			while($row = $result->fetch_array()):
			$docDestination = "uploads/books/".$row['bdoc'];
			$user = $row['fuploader'];
			$sql = "SELECT fname FROM faculty WHERE femail='$user'";
			$result1 = mysqli_query($conn, $sql);
			$user2 = $result1->fetch_array();
		?>
		
		<table>
			<tr>
			<th>Book Name</th>
			<th>Book Description</th>
			<th>Course</th>
			<th>Link</th>
			<th>Uploaded By:</th>
			</tr>
			<tr>
			<td><?php echo $row['bookname'].'';?></td>
			<td><?php echo "Description : ".$row['bookdesc'];?></td>
			<td><?php echo "Course : ".$row['bcourse'].'';?></td>
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