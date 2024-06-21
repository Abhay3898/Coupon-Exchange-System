

<?php
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$points = 0;
//connect to the database 
$host = "192.168.16.252";
$user = "AG26";
$pass = "";
$dbname = "AG26";
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

//insert the data into the database 
$sql = "INSERT INTO Customer(user_id,username,email,password,points)VALUES('$user_id','$username','$email','$password','$points')";
$result = pg_query($conn, $sql);
if ($result) {
	echo '<script>alert("Registration Successful")</script>';
	header("Location: login.html");
	
}else{
	echo"Registration Failed";
}

//closed the database connection
pg_close($conn);
?>

