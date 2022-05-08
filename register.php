<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
							<li><a href="login.php">Login</a></li>
							<li class="active"><a href="register.php">Register</a></li>
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
    </div>  . <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />.
		</div>			
	</div>	
		</td>
		<td width="36%">
		<div class="content">
	<div class="single">
			
 <div>
        <h2 align="center"><font color="white">Sign Up</font></h2>
        <p align="center"><font color="white">Please fill this form to create an account.</font></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<br /><br />
            <div class="form-group">
                <label><font color="white">Username</font></label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>   <br /> 
            <div class="form-group">
                <label><font color="white">Password</font></label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div><br />
            <div class="form-group">
                <label><font color="white">Confirm Password</font></label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div><br />
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php" style="text-decoration:none;"><font color="white">Login here</font></a>.</p>
			
        </form>
    </div>    

		</div>			
	</div>
</td>
<td width="32%"><div class="content">
	<div class="single">	
 <div>
    </div>  . <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />.
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

