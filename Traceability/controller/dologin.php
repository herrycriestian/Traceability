<?php  
include('connect.php');
	session_start();

	
	$user = $_REQUEST['txtuser'];
	$pass = $_REQUEST['txtpass'];

	if($user == null || $pass == null || $user == "" || $pass == ""){
		header("location:../login.php?msg=Username or Password must be filled !");
	}
	else{
		
		$query = "select * from msuser where username = '$user' and password = '$pass'"; // and lname = 'lname' and fname = 'fname'
		$data = mysql_query($query);
		  
		  	while($row = mysql_fetch_array($data)){ //looping setiap tablenya yang diinginkan
						$fname = $row['fname'];
						$lname = $row['lname'];
						$userid = $row['UserId'];
						$fdsafe = $row['fdsafe'];
						} 	

		if($fdsafe == "FALSE"){
			header("location:../login.php?login_msg=FDSAFE STATUS  = FALSE, NOT GRANTED!");
		}
		else if(mysql_num_rows($data) > 0){
			$_SESSION['username'] = $user;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['user_id'] = $userid;
			$_SESSION['fdsafe'] = $fdsafe;

			header("location:../home.php");
		}
		else{
			header("location:../login.php?login_msg=Invalid Username or Password!");
		}
	}

?>