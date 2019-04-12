<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="bootstrap.min.css">
		<style>
	        body {
	            background-image: url("1.jpg");
	            background-color: #cccccc;
	            background-size: cover;
	            background-repeat: no-repeat;
	         }

			#info {
			  font-family: "Trebuchet MS";
			  border-collapse: collapse;
			  width: 80%;
			  margin: auto;
			}
  	</style>
</head>
<body>
	<div class="container">
		<br> <h1 class="text-center text-primary">Home Page </h1> <br>
		<h2 class="text-center text-success">Welcome, <?php echo $_SESSION['username']; ?> </h2> <br>
		
		<div style="padding-left: 48%;">
			<a href="profile.php" class="btn btn-primary"> Profile </a>
		</div>
		<br>
		<div class="col-lg-12 m-auto d-block">
			<div class="card">
				<h3 class="text-center card-header">Go through the following before proceeding to the test page.</h3>
			</div>
			<br>
			<form action="test.php" method="post">
				<div id="info">
					<center>
						<hr><h4> ✦ You will have 20 questions </h4>
					    <hr><h4> ✦ Each questions have 4 options </h4>
					    <hr><h4> ✦ Choose any 1 of the 4 radio buttons </h4>
					    <hr><h4> ✦ Attempt as many question as you can for more score </h4>
				    	<hr><h4> ✦ After giving answers click on the 'Submit' button to see the marks </h4>
						<hr><h4> ✦ Upon submisson you will be redirected to the results page of the current test </h4>
						<hr><h4> ✦ Caution: If you do not click on 'Submit', your answers will not be saved in the database </h4>
						<hr><h4> ✦ You may click on the 'Profile' button anytime to see how you performed in your previous tests </h4>
						<hr><br>
					</center>
				</div>

				<input type="submit" name="submit" value="Take test" class="btn btn-success m-auto d-block"><br>

			</form>
		</div>	
	</div>
	<div style="padding-left: 48.5%;">
		<a href="logout.php" class="btn btn-warning"> Logout </a>
	</div>

</body>
</html>