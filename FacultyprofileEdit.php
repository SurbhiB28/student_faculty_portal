<?php
    session_start();

    require 'db.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = dataFilter($_SESSION['Username']);
        $newName = $_POST['newName'];
        $newUname = $_POST['newUname'];
        $newMobile = $_POST['newMobile'];
        $newEmail = $_POST['newEmail'];
    }

    $sql = "SELECT * FROM faculty WHERE fusername='$user'";
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
			$sql = "UPDATE faculty SET fname='$newName' WHERE fusername='$user'";
			
			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Name'] = $newName;
			}
		}
		
		if($newUname != NULL AND $newUname !='')
		{
			$sql = "UPDATE faculty SET fusername='$newUname' WHERE fusername='$user'";
			
			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Username'] = $newUname;
			}
		}
		
		if($newMobile != NULL AND $newMobile !='')
		{
			$sql = "UPDATE faculty SET fmobile='$newMobile' WHERE fusername='$user'";
			
			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Mobile'] = $newMobile;
			}
		}
		
		if($newEmail != NULL AND $newEmail !='')
		{
			$sql = "UPDATE faculty SET femail='$newEmail' WHERE fusername='$user'";
			
			$result = mysqli_query($conn, $sql);

			if($result)
			{
				$_SESSION['Email'] = $newEmail;
			}
		}
		
		
		$result = mysqli_query($conn, $sql);

        if($result)
        {
			header("location: FacultyProfileView.php");
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