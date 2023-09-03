<?php
    session_start();

    require 'db.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = dataFilter($_SESSION['Roll No.']);
        $newName = $_POST['newName'];
        $newRoll = $_POST['newRoll'];
        $newMobile = $_POST['newMobile'];
        $newEmail = $_POST['newEmail'];
		$newCourse = $_POST['newCourse'];
    }

    $sql = "SELECT * FROM student WHERE broll='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);


    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid Information Passed!";
        header("location: Login/error.php");
    }
    else
    {
        $User = $result->fetch_assoc();

        if($newName != NULL AND $newName !='')
		{
			$sql = "UPDATE student SET bname='$newName' WHERE broll='$user';";

			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Name'] = $newName;
			}
		}

		if($newRoll != NULL AND $newRoll !='')
		{
			$sql = "UPDATE student SET broll='$newRoll' WHERE broll='$user';";

			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Roll No.'] = $newRoll;
			}
		}

		if($newMobile != NULL AND $newMobile !='')
		{
			$sql = "UPDATE student SET bmobile='$newMobile' WHERE broll='$user';";

			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Mobile'] = $newMobile;
			}
		}

		if($newEmail != NULL AND $newEmail !='')
		{
			$sql = "UPDATE student SET bemail='$newEmail' WHERE broll='$user';";

			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Email'] = $newEmail;
			}
		}

		if($newCourse != NULL AND $newCourse !='')
		{
			$sql = "UPDATE student SET bcourse='$newCourse' WHERE broll='$user';";

			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Course'] = $newCourse;
			}
		}

		$result = mysqli_query($conn, $sql);

        if($result)
        {
			header("location: StudentProfileView.php");
        }
        else
        {
			$_SESSION['message'] = "Invalid";
			header("location: ../Login/error.php");
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