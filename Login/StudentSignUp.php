<?php
    session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name = dataFilter($_POST['name']);
	$mobile = dataFilter($_POST['mobile']);
	$roll = dataFilter($_POST['roll']);
	$email = dataFilter($_POST['email']);
	$pass =	dataFilter($_POST['pass']);
	$cpass = dataFilter($_POST['password']);
	$hash = dataFilter( md5( rand(0,1000) ) );
    $course = dataFilter($_POST['course']);

	$_SESSION['Email'] = $email;
    $_SESSION['Name'] = $name;
    $_SESSION['Roll No.'] = $roll;
    $_SESSION['Mobile'] = $mobile;
    $_SESSION['Hash'] = $hash;
    $_SESSION['Course'] = $course;
}


require '../db.php';

$length = strlen($mobile);

if($length != 10)
{
	$_SESSION['message'] = "Invalid Mobile Number !!!";
	header("location: error.php");
	die();
}

    $sql = "SELECT * FROM student WHERE bemail='$email'";

    $result = mysqli_query($conn, "SELECT * FROM student WHERE bemail='$email'") or die($mysqli->error());

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
    	$sql = "INSERT INTO student (bname, broll, bpassword, bhash, bmobile, bemail, bcourse)
    			VALUES ('$name','$roll','$pass','$hash','$mobile','$email','$course')";

    	if (mysqli_query($conn, $sql))
    	{
            $_SESSION['stu_logged_in'] = true;

            $sql = "SELECT * FROM student WHERE broll='$roll'";
            $result = mysqli_query($conn, $sql);
            $User = $result->fetch_assoc();
            $_SESSION['id'] = $User['bid'];

			
            $message_body = "
            Hello '.$user.',

            Thank you for signing up!";

            header("location: StudentProfile.php");
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
