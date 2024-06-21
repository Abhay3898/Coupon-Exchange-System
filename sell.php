<?php
$username = $_COOKIE['username'];
echo "<h1>".$username."</h1><br>";

//connect to the database 
$host = "192.168.16.252";
$user = "AG26";
$pass = "";
$dbname = "AG26";
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
/*check if the connection is sucessful
if($conn)
	echo "connected<br>";

else 
	echo "rip";*/

//rretrieve from data

$coupon_name= $_POST['coupon_name'];
$c_id= $_POST['c_id'];
$validity= $_POST['validity'];
$discount= $_POST['discount'];
$Submit = $_POST['Submit'];

/*check if form is submitted
if(isset($_POST['Submit'])){

echo $c_id;
echo $coupon_name;
echo $discount;
echo $validity;
echo "Something Went Wrong";
}*/

// database insert SQL code and insert data into database
$sql = "INSERT INTO coupon VALUES ('$coupon_name','$c_id','$discount','$validity')";

// insert in database 
$rs = pg_query($conn, $sql);



//$username = $_COOKIE['username'];


if($rs)
{
	//echo "<H2>COUPON : ".$coupon_name." SUBMITTED SUCCESSFULY<br></H2>";
	$currency = pg_query($conn,"SELECT points FROM Customer where  user_id='$username'");

	$row = pg_fetch_assoc($currency);
	//echo $row['points']."<br>";


	 	 // retrive the users account balance from the database
		$balance = $row['points'];
	  	//ADD 1 from users account balance 
		$new_balance = $balance + 1;
		//echo "Your balance is : ".$new_balance."<br>";
		//update users account balance in the database 
		$update_query = "UPDATE Customer SET points = $new_balance WHERE  user_id='$username'";
		pg_query($conn, $update_query) or die("points not updated");
		//header("Location:couponpage.html"); 	
		

}
else
{
	echo "Opps!! Something went wrong";
	
} 
pg_close($conn);

?>

<html>
	<head>
	<link rel="stylesheet" href="buy.css">
		<style>
			.background {
			position:absolute;
			left:0px;
			top:0px;
			z-index:-1;
			width:100%;
			height:100%;
			filter:blur(3px);
			}

			.navbar {
    				background-color: blanchedalmond;
				height: 40px;
				display: flex;
				margin: 0px 0px 15px 0px;
				flex:content;
			}
			.display_couponDetail button {
				padding : 3px 5px 3px 5px;
				background-color: #E55451;
				color: white;
			}

		</style>
		
	</head>
	<body>
		<nav class="navbar">
			<a href="couponpage.html" class="home">Home</a>
			<a href="about.html" class="about">About</a>
			<a class="user_balance"><?php echo "<b>Balance<b> : ".$new_balance;?></a>
        	</nav>
		<div class="container-one"> <img class="background" src="images/backreg3.jpeg" alt="hii"> </div>
			<div class="display_couponDetail">
				<center>
					<h1><?php echo $coupon_name ;?></h1>
					<br>
					<h2>Submitted Successfully</h2>
				</center>
				<br><br><br>
				<button onclick="window.location.href='couponpage.html'">Return to Home Page</button>
			</div>

	</body>
</html>


