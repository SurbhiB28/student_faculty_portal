<?php
    session_start();

    $user = dataFilter($_POST['roll']);
    $pass = $_POST['pass'];

    require '../db.php';

    $sql = "SELECT * FROM student WHERE broll='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentialss!";
        header("location: error.php");
    }

    else
    {
        $User = $result->fetch_assoc();

        if (password_verify($_POST['pass'], $User['bpassword']))
        {
            $_SESSION['id'] = $User['bid'];
            $_SESSION['Hash'] = $User['bhash'];
            $_SESSION['Password'] = $User['bpassword'];
            $_SESSION['Email'] = $User['bemail'];
            $_SESSION['Name'] = $User['bname'];
            $_SESSION['Roll No.'] = $User['broll'];
            $_SESSION['Mobile'] = $User['bmobile'];
            $_SESSION['Course'] = $User['bcourse'];
			$_SESSION['stu_logged_in'] = true;

            header("location: StudentProfile.php");
        }
        else
        {
            $_SESSION['message'] = "Invalid User Credentials!";
            header("location: error.php");
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
