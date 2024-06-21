<?php




// Retrieve the form data
//setcookie('user_id',$user_id,time()+3600,'/');

setcookie('username',$_POST["user_id"]);//,time() + 3600);
$username = $_COOKIE['username'];
// Connect to the database
$host = "192.168.16.252";
$user = "AG26";
$pass = "";
$dbname = "AG26";
//$username = $_COOKIE['user_id'];
//$password = $_COOKIE['password'];
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
//$user_id = $_COOKIE['user_id'];
// Check if the user exists in the database
$sql = "SELECT * FROM Customer WHERE user_id='$username' AND password='".$_POST["password"]."' ";
$result = pg_query($conn, $sql);
echo $result;
if (pg_num_rows($result) > 0) {
    // User is authenticated, set a session variable and redirect to the dashboard
    setcookie('authenticated','true');//,time() + 3600);
    header("Location:couponpage.html");
} else {
    // Authentication failed, redirect to the login page with an error message
   // header("Location: login.php?error=1");
	echo "Login Failed";
}

// Close the database connection
pg_close($conn);
?>
