<?php 
//Connects to your Database

$host = "localhost";
$username = "root";
$password = "";
$db_name = "wor"; 
$connect = mysqli_connect($host,$username,$password,$db_name) or die(mysqli_error($connect));  

//This code runs if the form has been submitted
if (isset($_POST['submit2'])) { 
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$cpass = $_POST['cpassword'];

//This makes sure they did not leave any fields blank
if (!$username | !$email | !$pass | !$cpass ) {
			?>
                <script>
                    alert("Please fill all the details")
                </script>
            <?php
}

// checks if the username is in use

$emailquery = "SELECT * FROM `users` WHERE email='$email'";
$query = mysqli_query($connect,$emailquery);
$emailcount = mysqli_num_rows($query);

$usercheck = $_POST['username'];
$query = "SELECT username FROM users WHERE username = '$usercheck'";
$check = mysqli_query($connect,$query);
$check2 = mysqli_num_rows($check);

// here we encrypt the password and add slashes if needed
//$password = md5($password);

if($emailcount == 0){
	//if the name exists it gives an error
	if($check2 != 0){
		?>
			<script>
				alert("Sorry, this username is already in use.")
				window.location.href = "../php2/add.php"
			</script>
		<?php
		die();
	}
	else{
		if ($pass == $cpass) {
			// now we insert it into the database
			$insertquery = "INSERT INTO users (username,email,password,cpassword) VALUES ('".$username."', '".$email."', '".$pass."', '".$cpass."')";
			$add_member = mysqli_query($connect,$insertquery);
			if($add_member){
				?>
					<script>
						alert("Signup Sucessful")
						window.location.href="../php2/login.php"
					</script>
				<?php
			}
			else{
				?>
					<script>
						alert("Signup failed please try again")
						window.location.href = "../php2/add.php"
					</script>
				<?php
				die();
			}
		}

		else{
				?>
					<script>
						alert("Password did not match")
						window.location.href = "../php2/add.php"
					</script>
				<?php
				die();
		}
	}	
}
else{
	    ?>
			<script>
				alert("User with this email already exists")
				window.location.href = "../php2/add.php"
			</script>
		<?php
}

?>

 <?php 
 }

 else 
 {	
 ?>
 
 <html>
    <head>
        <title>SignUp</title>
        <link rel="stylesheet" href="../style/signup.css">
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
                    <h2>You Can Sign Up<br>Here...</h2>
                    <h3>Get Best Price</h3>
                    <p>Earn / Get Car Easily</p>
                    <h4>Become A Part Of Our family :)</h4>
                </div>
                <div class="col-2">
                    <div class="form-box">
                        <div class="button-box">
                            <div id="btn"></div>
                            <button type="button" class="toggle-btn" onclick="dealer()">Dealer</button>
                            <button type="button" class="toggle-btn" onclick="customer()">Customer</button>
                        </div>
                        <form id="dealer" class="input-group" method="POST">
                            <p class="heading">Dealer Registration</p>
                            <p class="head-in">Name</p>
                            <input type="text" class="input-field" placeholder="Enter Name" required>
                            <p class="head-in">Email</p>
                            <input type="text" class="input-field" placeholder="Enter Email" required>
                            <p class="head-in">Password</p>
                            <input type="password" class="input-field" placeholder="Enter Password" required>
							<p class="head-in">Confirm Password</p>
                            <input type="password" class="input-field" name="cpassword" placeholder="Enter Password" required>
                            <button type="submit" name="submit1" class="submit-btn">Sign Up</button>
                        </form>
                        <form id="customer" class="input-group" method="POST">
                            <p class="heading">Customer Registration</p>
                            <p class="head-in">Email</p>
                            <input type="text" class="input-field" name="email" placeholder="Enter Email" required>
                            <p class="head-in">Username</p>
                            <input type="text" class="input-field" name="username" placeholder="Username" required>
                            <p class="head-in">Password</p>
                            <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
							<p class="head-in">Confirm Password</p>
                            <input type="password" class="input-field" name="cpassword" placeholder="Enter Password" required>
                            <button type="submit" name="submit2" class="submit-btn">Sign Up</button>
                        </form>
                    </div>
                </div>
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
        <script>
            var x=document.getElementById("dealer");
            var y=document.getElementById("customer");
            var z=document.getElementById("btn");

            function customer(){
                x.style.left="-400px";
                y.style.left="55px";
                z.style.left="110px";
            }
            function dealer(){
                x.style.left="55px";
                y.style.left="455px";
                z.style.left="0";
            }

            document.getElementById("homebtn").onclick=function(){
                location.href="../home.html";
            }

        </script>
    </body>

</html>

 <?php
 }
 ?> 
