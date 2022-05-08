<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>The Library</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="index.html" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!---->
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<!-- Scroll top -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--End  Scroll top -->
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
  <div class="container">
  	 <div class="header">  	
		 		<!-- Slider -->				
				     <div class="slider">
				      <div class="slider-wrapper theme-default">
				            <div id="slider" class="nivoSlider">
				                <img src="https://source.unsplash.com/1289x700/?library,books" alt="" />
				                <img src="https://source.unsplash.com/1289x700/?library,book" alt="" />
				                <img src="https://source.unsplash.com/1289x700/?library,books1" alt="" />
				                <img src="https://source.unsplash.com/1289x700/?library,books2" alt="" />
								<img src="https://source.unsplash.com/1289x700/?library,book1" alt="" />
				                <img src="https://source.unsplash.com/1289x700/?library,book2" alt="" />
				            </div>
				        </div>
				          <div class="header_desc">
				 			 <div class="logo">
				 				<a href="index.html"><h1>THE <font color="white">LIBRARY</font></h1></a>
							 </div>							
		     		    </div>
				   </div>
			     <!--- End Slider --->
		   <div class="header-bottom">
		      <div class="top-nav">
			  <span class="menu"><img src="images/menu.png" alt=""> </span>

					    <ul>
							<li><a href="index.html">Home</a></li>
							<li class="active"><a href="login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
							<div class="clearfix"></div>
						</ul>
						<script>
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle(500, function(){
							});
						});
					</script>

					</div>
		 		    <div class="clearfix"></div>
               </div>
		 </div>
	</div>
	<!---->
	<div class="container">
	<table border="0" bordercolor="white" width="100%">
		<tr>
		<td width="32%">
		<div class="content">
	<div class="single">	
 <div>
    </div>  . <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />.
		</div>			
	</div>	
		</td>
		<td width="36%">
		<div class="content">
	<div class="single">
			
 

<div class="wrapper">
        <h2 align="center"><font color="white">Login</font></h2>
        <p align="center"><font color="white">Please fill in your credentials to login.</font></p>
<br /><br />
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label><font color="white">Username</font></label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    <br />
            <div class="form-group">
                <label><font color="white">Password</font></label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php" style="text-decoration:none;"><font color="white">Sign up now</font></a>.</p>
        </form>
    </div>    

		</div>			
	</div>
</td>
<td width="32%"><div class="content">
	<div class="single">	
 <div>
    </div>  . <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />.
		</div>			
	</div>	</td>
			</tr>
			</table>
	</div>

  <div class="container">
  <!---->
	 <div class="copy">
		 	<p >© 2021 The Library All Rights Reserved</p>
		</div>	

   
  </div>  
</body>
</html>
