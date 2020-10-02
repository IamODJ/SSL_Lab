<?php session_start(); /* Starts the session */
	
	if(isset($_POST['Submit'])){
		$logins = array('eval' => 'eva');  /*We could add more here*/
		
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:album.php");
			exit;
		} else {
			$msg ="<span style='color:red;text-align:center'>Invalid Login Details</span>";
		}
	}
?>