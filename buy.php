<?php

$username = $_COOKIE['username'];
echo "<h1>".$username."</h1><br>";

//connect to the database 
$host = "192.168.16.252";
$user = "AG26";
$pass = "";
$dbname = "AG26";
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
/*
if($conn)
	echo "connected<br>";

else 
	echo "rip";*/


$myVariable = $_POST['myVariableInput'];
//echo $myVarirable;

$result = pg_query($conn, "SELECT * FROM coupon where coupon_name= '$myVariable'");

//$rs = pg_query($conn, $result) or die("Cannot execute query: $query\n");
if(!$result){
	echo "coupon not available";
	header("Location:couponpage.html");
}
else{
	$currency = pg_query($conn,"SELECT points FROM Customer where  user_id='$username'");
	$roww = pg_fetch_assoc($currency);
	if($roww['points'] < 1){
		    echo "You have low balance";
		    pg_close($db);
	  } 
	   else{
		while ($row = pg_fetch_assoc($result)) {
		  //echo "Details of coupons are : <br>";
		  //echo $row['coupon_name']."<br>".$row['coupon_id']."<br>".$row['discount']."<br>".$row['validity']."<br>";
		  $c_id = $row['coupon_id'];
		  $c_name = $row['coupon_name'];
		  $c_validity = $row['validity'];
		  $c_discount = $row['discount'];
		  $sql = "DELETE FROM Coupon WHERE coupon_id='$c_id'";
		  $delete_result = pg_query($conn,$sql);
		  if ($delete_result) {
		    //echo "Coupon Fetched successfully<br>";

			//echo $row['points']."<br>";


		  
		 	 // retrive the users account balance from the database
			$balance = $roww['points'];
		  	//Substract 1 from users account balance 
			$new_balance = $balance - 1;
			//echo "Your balance is : ".$new_balance."<br>";
			//update users account balance in the database 
			$update_query = "UPDATE Customer SET points = $new_balance WHERE  user_id='$username'";
			pg_query($conn, $update_query) or die("points not updated");
			//header("Location:couponpage.html"); 	
			}

		   else {
		   	echo "Error Coupon not available";
		  }
		}
	}
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
			.trial {
				color:orange;
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
		<div class="container-one">		<img class="background" src="images/backreg5.jpeg" alt="hii"> </div>
			<div class="display_couponDetail">
				<table>
					<tr>
						<th>Coupon Name</th>
						<th>Coupon ID</th>
						<th>Discount</th>
						<th>Validity</th>
					</tr>
					<tr>
						<td><?php echo $c_name; ?></td>
						<td><?php echo $c_id; ?></td>
						<td><?php echo $c_discount; ?></td>
						<td><?php echo $c_validity; ?></td>
					</tr>
				</table>
				<br><br><br>
				<button onclick="window.location.href='couponpage.html'">Return to Home Page</button>
			</div>

		
	</body>
</html>
