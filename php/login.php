<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car Rental Website</title>
        <link rel="stylesheet" href="../style/login.css">
        <script src="https://kit.fontawesome.com/b38a2e296f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    </head>
    <body>
        <div class="container" id="container">
            <div class="navbar">
                <img src="../images/worlogo1.png" class="logo">
                <nav>
                    <ul>
                        <li><a href="../home.html">Home</a></li>
                        <li><a href="#footer">About</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Pricing</a></li>
                        <li><a href="">Cars</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="top-arrow"><a href="#container"><i class="bi bi-arrow-up-square-fill"></i></a></div>
            <div class="row">
                <div class="col-1">
                    <img src="../images/jeep31.png" class="home-car1">
                    <div class="color-box1"></div>
                </div>
                    <form method="POST">
                    <div class="col-2">
                        <div class="container_login">
                            <p class="heading">Login In</p>
                            <div class="box">
                                <p>Username</p>
                                <div>
                                    <input type="text" class="input-field" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="box">
                                <p>Password</p>
                                <div>
                                    <input type="password" name="password" id="" placeholder="Enter Your Password">
                                </div>
                            </div>
                            <button class="loginBtn" name="submit">Login</button>
                            <p class="text">Don't have an account? <a href="../wor/php/signup.html">Sign Up</a></p>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
        <!--footer-->
        <footer id="footer">
            <div class="footer">
                <div class="aboutus">
                    <h2>About Us</h2>
                    <p>hhwdhwe owhowhodwodo d wdhwodhowhdow dw dowhdowhdow dw dowhdowhdowwo
                         hodowhdowodhowhdwohdowjw jdodjowd wd iow hdowhdohwodhowhdiowhdiohiowho
                         wd wohdowhdowod wohow hohw odhowhdodwoidwodo ihfihihhh iygygugyggug
                         oiwhdhwoow</p>
                    <ul class="sci">
                        <li class="facebook"><a href=""><img src="../images/facebook.png"></a></li>
                        <li class="whatsapp"><a href=""><img src="../images/whatsapp.png"></a></li>
                        <li class="instagram"><a href=""><img src="../images/instagram.png"></a></li>
                        <li class="twitter"><a href=""><img src="../images/twitter.png"></a></li>
                    </ul>
                </div>
                <div class="sec">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Helps</a></li>
                        <li><a href="">Terms & Conditions</a></li>                       
                    </ul>
                </div>
                <div class="contact">
                    <h2>Contact Info</h2>
                    <ul class="call">
                        <li>
                            <span><img src="../images/locate.png"></span>
                            <p>E-103, Anand Vihar Flats
                            <br>Tragad Road, Chandkheda-382424</p>
                        </li>
                        <li>
                            <span><img src="../images/call.png"></span>
                            <p><a href="tel:8460997269">+91 8460997269</a></p>
                        </li>
                        <li>
                            <span><img src="../images/email.png"></span>
                            <p><a href="mailto:312002danny@gmail.com">312002danny@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="copyright">
            <p>Copyright @ 2022 Wheels On Rent Team. All Rights Reserved.</p>
        </div>
    </body>
</html>
<?php 

//Connects to your Database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "wor"; 
$connect = mysqli_connect($host,$username,$password,$db_name); 

//Checks if there is a login cookie
if(isset($_COOKIE['ID_your_site'])){ //if there is, it logs you in and directes you to the members page
 	$username = $_COOKIE['ID_your_site']; 
 	$pass = $_COOKIE['Key_your_site'];
	$cquery = "SELECT * FROM users WHERE username = '$username'";
 	$check = mysqli_query($connect,$cquery);//or die(mysqli_error($check));

 	while($info = mysqli_fetch_array( $check )){
 		if ($pass != $info['password']){}
 		else{
			?>
				<script>
					alert("Signup Sucessful")
					//window.location.href="../php2/login.php"
				</script>
			<?php
		}
 	}
 }

 //if the login form is submitted 
 if (isset($_POST['submit'])) {

    $username = $_POST['username'];
	$pass = $_POST['password'];

	// makes sure they filled it in
 	if(!$username){
 		die('You did not fill in a username.');
 	}
 	if(!$pass){
 		die('You did not fill in a password.');
 	}

 	// checks it against the database
 	//if (!get_magic_quotes_gpc()){
 		//$_POST['email'] = addslashes($_POST['email']);
 	//}

 	$check = mysqli_query($connect, "SELECT * FROM users WHERE username = '".$username."'");
 //Gives error if user dosen't exist
 $check2 = mysqli_num_rows($check);
 if ($check2 == 0){
	die('That user does not exist in our database.<br /><br />If you think this is wrong <a href="login.php">try again</a>.');
}

while($info = mysqli_fetch_array( $check )){
	$_POST['password'] = stripslashes($_POST['password']);
 	$info['password'] = stripslashes($info['password']);
 	//$_POST['password'] = md5($_POST['password']);

	//gives error if the password is wrong
 	if ($_POST['password'] != $info['password']){
 		die('Incorrect password, please <a href="login.php">try again</a>.');
 	}
	
	else{ // if login is ok then we add a cookie 
		$_POST['username'] = stripslashes($_POST['username']); 
		$hour = time() + 3600; 
		setcookie('ID_your_site', $_POST['username'], $hour); 
		setcookie('Key_your_site', $_POST['password'], $hour);	 
 
		//then redirect them to the members area 
		//header("Location: members.php"); 
            ?>
					<script>
						window.location.href = "../html/main.html"
					</script>
				<?php
	}
}
}
else{
// if they are not logged in 
?>

  

 <?php 
 }
 ?> 
