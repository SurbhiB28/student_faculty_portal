<?php
    session_start();

   if ( $_SESSION['stu_logged_in'] != true )
    {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: error.php");
    }
    else
    {

       $email =  $_SESSION['Email'];
       $name =  $_SESSION['Name'];
       $user =  $_SESSION['Roll No.'];
       $mobile = $_SESSION['Mobile'];
	   $loginProfile = "My Profile: ". $_SESSION['Roll No.'];
    }
?>

<!DOCTYPE html>
    <html >
     <head>
        <title>Student Portal</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../js/jquery.min.js"></script>
        <link href="../bootstrap\css\bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../bootstrap\js\bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="../css/template.css" rel="stylesheet">
		<link href="../css/student-profile.css" rel="stylesheet">
    </head>

    <body>
			
			<?php
            require 'StudentMenu.php';
			?>
			
			<h2 class="view">Welcome to Student Portal</h2>
			
			<p>
                <?php
                    if ( isset($_SESSION['message']) )
                    {
                        echo $_SESSION['message'];
                        unset( $_SESSION['message'] );
                    }
                ?>
			</p>
				
			<span style="display:block; height:250px;"></span>
			<center style="top: -100px;position: relative;">
			<h2>Hello, <?php echo $name; ?> ,how u doin'?</h2>
			</center>
			<span style="display:block; height:60px;"></span>
            
			<button onclick="location.href='../StudentProfileView.php'" type="button">My Profile</button>
			<button onclick="location.href='logout.php'" type="button">Log Out</button>
			
			<!--HERE -->
			<script src="../js/template.js"></script>
    </body>
</html>