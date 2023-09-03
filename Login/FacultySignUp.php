<?php
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = dataFilter($_POST['name']);
	$mobile = dataFilter($_POST['mobile']);
	$user = dataFilter($_POST['uname']);
	$email = dataFilter($_POST['email']);
	$pass =	dataFilter($_POST['pass']);
	$cpass = dataFilter($_POST['password']);
	$hash = dataFilter( md5( rand(0,1000) ) );

	$_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Username'] = $user;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['Hash'] = $hash;
}


require '../db.php';

$length = strlen($mobile);

if($length != 10)
{
	$_SESSION['message'] = "Invalid Mobile Number !!!";
	header("location: error.php");
	die();
}

    $sql = "SELECT * FROM faculty WHERE femail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM faculty WHERE femail='$email'") or die($mysqli->error());

    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else if($pass != $cpass)
	{
		$_SESSION['message'] = "Password don't match!!!";
        header("location: error.php");
	}
	else
    {
		$pass =	dataFilter(password_hash($_POST['pass'], PASSWORD_BCRYPT));
    	$sql = "INSERT INTO faculty (fname, fusername, fpassword, fhash, fmobile, femail)
    			VALUES ('$name','$user','$pass','$hash','$mobile','$email')";

    	if (mysqli_query($conn, $sql))
    	{
            $_SESSION['fac_logged_in'] = true;

            $sql = "SELECT * FROM faculty WHERE fusername='$user'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['fid'];

            $message_body = "
            Hello '.$user.',

            Thank you for signing up!";

            header("location: FacultyProfile.php");
    	}
    	else
    	{
    	    $_SESSION['message'] = "Registration failed!";
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
