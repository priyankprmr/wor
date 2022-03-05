<?php
//Connects to your Database 
$host = "localhost";
$username = "root";
$password = "";
$db_name = "wor"; 
$connect = mysqli_connect($host,$username,$password,$db_name) or die(mysqli_error($connect));

 //checks cookies to make sure they are logged in 
 if(isset($_COOKIE['ID_your_site'])){ 

 	$username = $_COOKIE['ID_your_site']; 
 	$pass = $_COOKIE['Key_your_site'];
	$query ="SELECT * FROM users WHERE username = '$username'";
 	$check = mysqli_query($connect,$query);

 	while($info = mysqli_fetch_array( $check )){ 

		//if the cookie has the wrong password, they are taken to the login page 
 		if ($pass != $info['password']){
			header("Location: login.php"); 
 		}
		//otherwise they are shown the admin area
		else{
		
 			 echo "Admin Area<p>"; 
     echo "Your Content<p>"; 
     echo "<a href=logout.php>Logout</a>"; 
 		}
	}
}

 else{ //if the cookie does not exist, they are taken to the login screen 
	header("Location: login"); 
 }
 ?>
