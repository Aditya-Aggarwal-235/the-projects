<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
			  <span class="menu"><img src="images/menu.png" alt=""> </span><br>
					<h1 class=""><font color="white">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></font></h1><br>
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

<div class="container" id="contact">
		<div class="content">
			<div class="contact">
				<h2>APPLY FOR BOOK ENQUIRY</h2>
				
				
			
			<div class="contact-form">
				<div class="col-md-6 contact-grid">
					<form action="insert2.php" method="post">
						<p class="your-para">Email</p>
						<input type="text" name="email"value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"><br><br>
			            <p class="your-para">Book Name</p>
						<input type="text" name="book_name" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"><br><br>
						<p class="your-para">Author Name</p>
						<input type="text" name="author_name" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"><br><br>
     						<div class="send">
							<input type="submit" value="APPLY" >
						</div>
					</form>
				</div>
				<div class="col-md-6 contact-in">
					<p class="sed-para"> Please fill it carefully!!</p>
					<h3>Please fill the following detail, In order to enquire for the information you seek for the desired book.</h3>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>

		</div>
	</div>
	
	<div class="container">
	 <div class="content">
		 	
    <p align="center">
        <a href="logout.php" class="hvr-sweep-to-right">Sign Out of Your Account</a>
    </p>
		</div>	
  </div>

  <div class="container">
	 <div class="copy">
		 	<p >© 2021 The Library All Rights Reserved</p>
		</div>	
  </div>
</td>
<td>
</td>
</tr>

</table>  
</body>
</html>

