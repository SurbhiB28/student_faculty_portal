<?php
	session_start();
	require 'db.php';

	$sql = "SELECT * FROM fbook WHERE pid='" . $_GET["id"] . "'";
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
		unlink(dirname(__FILE__) ."/uploads/books/".$User['bdoc']);
	}


	$sql = "DELETE FROM fbook WHERE pid='" . $_GET["id"] . "'"; 

	if (mysqli_query($conn, $sql))
	{
		header("location: bookMenu.php");
	}
	else 
	{	
		$_SESSION['message'] = "Error While deleting";
		header("location: ../Login/error.php");
	}

	mysqli_close($conn);
?> 