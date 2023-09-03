<?php
	session_start();
	if(!isset($_SESSION['fac_logged_in']) OR $_SESSION['fac_logged_in'] != true)
	{
		$_SESSION['message'] = "Sorry you don't have permission, Only Faculty Can Upload!!!";
		header("Location: Login/error.php");
	}
?>

<?php
	require 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$bookName = dataFilter($_POST['bookname']);
		$course = dataFilter($_POST['course']);
		$bookDesc = $_POST['bookdesc'];
		$fuploader = $_SESSION['Email'];

		$sql = "INSERT INTO fbook (bookname, bcourse, bookdesc, fuploader)
			   VALUES ('$bookName', '$course', '$bookDesc', '$fuploader')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			$_SESSION['message'] = "Unable to upload Book !!!";
			header("Location: Login/error.php");
		}
		else {
			$_SESSION['message'] = "Successful !!!";
		}

		$doc = $_FILES['bookDoc'];
		$docName = $doc['name'];
		$docTmpName = $doc['tmp_name'];
		$docError = $doc['error'];
		$docExt = explode('.', $docName);
		$docActualExt = strtolower(end($docExt));

		if($docError === 0)
		{
			$_SESSION['docId'] = $_SESSION['id'];
			$docNameNew = $bookName.$_SESSION['docId'].".".$docActualExt ;
			$bookDestination = 'uploads/books/'.$docNameNew;
			move_uploaded_file($docTmpName, $bookDestination);

			$sql = "UPDATE fbook SET docStatus=1, bdoc='$docNameNew' WHERE bookname='$bookName';";

			$result = mysqli_query($conn, $sql);
			if($result)
			{
				header("Location: bookMenu.php");
			}
			else
			{
				$_SESSION['message'] = "There was an error in uploading the Book! Please Try again!";
				header("Location: Login/error.php");
			}
		}
		else
		{
			$_SESSION['message'] = "There was an error in uploading your Book! Please Try again!";
			header("Location: Login/error.php");
		}
	}

	function dataFilter($data)
	{
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
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
		
		<style>
		.input_box
		{
			background-color: #a22525;
			border: none;
			padding: 12px 6px;
			margin: 7px 198px;
			z-index: 2;
			width: 50%;
		}
		
		input
		{
			background-color: #a22525;
			border: none;
			padding: 12px 6px;
			margin: 7px 199px;
			z-index: 2;
			width: 103%;
		}
		</style>
	</head>
	
	<body>
		<?php require 'Login/FacultyMenu.php'; ?>
		
		<!-- One -->
		<form class="modal-container" method="POST" action="UploadBooks.php" enctype="multipart/form-data" style="background: black; text-align: center;color: white;opacity: 0.6;">
		<h2>Enter the BOOK Information here..!!</h2>
		<br>
		<input class="input_box" type="file" name="bookDoc" ></input>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<input type="text" name="bookname" id="bookname" value="" placeholder="Book Name"  />
				<br>
				<input type="text" name="bookdesc" id="bookdesc" value="" placeholder="Book Description" />
				<br>
				<select id="course" name="course"  required style="margin: 7px 350px;background-color: red;font-weight: 800;">
					<option value="BCA">BCA</option>
					<option value="BBA">BBA</option>
					<option value="BAM">BAM</option>
				</select>
				<br>
				<button type="submit" style="font-size: 22px;margin: 10px 300px;}">Submit</button>
			</div>
		</div>
		</form>
	</body>
</html>