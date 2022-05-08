<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$book_name = mysqli_real_escape_string($link, $_REQUEST['book_name']);
$author_name = mysqli_real_escape_string($link, $_REQUEST['author_name']);

// attempt insert query execution
$sql = "INSERT INTO afbe (email, book_name, author_name) VALUES ('$email', '$book_name', '$author_name')";
if(mysqli_query($link, $sql)){
      header( "Location: welcome.php" ); 
      exit;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>