<!DOCTYPE html>
<html>
<head>
	<style>
        .error {color: #FF0000;}
    </style>
	
	<?php

		$nameerr = $passerr = "";
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if(!empty($_POST['user'])||!empty($_POST['password'])) {

				session_start();
				$con = mysqli_connect('localhost','root');
				mysqli_select_db($con, 'testdb');
				$name = $_POST['user'];
				$pass = $_POST['password'];
				$q = "SELECT * FROM login  WHERE name = '$name' && password = '$pass'";
				$result = mysqli_query($con, $q);
				$num = mysqli_num_rows($result);
				if($num == 1) {
					$_SESSION['username'] = $name;
					header('location:home.php');
				}
				else echo "<script>alert('Username and Password do not match. Try again!');</script>";
			}
			
			if(!empty($_POST['user1']) || !empty($_POST['password1'])) {
				
				session_start();
				$name = $_POST['user1'];
				$pass = $_POST['password1'];

				if (!empty($name) && !empty($pass)) {

					if (strlen($name) >= 5 && strlen($name) <= 15 && strlen($pass) >= 5 && strlen($name) <= 15) {

						if (!ctype_alnum($name) || !ctype_alnum($pass)) {

							echo "<script>alert('Username and Password must only contain alphabets and numbers only. Try again!');</script>";
						}
						else {

							$host = "localhost";
							$dbUsername = "root";
							$dbPassword = "";
							$dbName = "testdb";

							$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

							if (mysqli_connect_error()) {

								die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
							}
							else {

								$SELECT = "SELECT name FROM login WHERE name = ? LIMIT 1";
								$INSERT = "INSERT INTO login (name, password) VALUES (?, ?)";
								
								$stmt = $conn->prepare($SELECT);
								$stmt->bind_param("s", $name);
								$stmt->execute();
								$stmt->bind_result($name);
								$stmt->store_result();
								$rnum = $stmt->num_rows();

								if ($rnum == 0) {

									$stmt->close();
									$stmt = $conn->prepare($INSERT);
									$stmt->bind_param("ss", $name, $pass);
									$stmt->execute();
									echo "<script>alert('You signed up successfully!')</script>";
								}
								else {

									 $nameerr='Username already exists. Choose another!';
								}
								$stmt->close();
								$conn->close();
							}
						}
					}
					else {

						echo "<script>alert('Username and Password must be between 5 and 15 characters. Try again!')</script>";
					}
				}
				else {

					if(empty($_POST['name1'])) $nameerr = "Username is required";
					if(empty($_POST['password1'])) $passerr = "password is required";
				}
			}	
		}
	?>

	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<style>
         body {
            background-image: url("1.jpg");
            background-color: #cccccc;
            background-size: cover;
         }
  	</style>
</head>
<body>
	<div class="container">
		<br><br><br><br><br><br>
		<h1 class="text-center text-success"> Welcome to Online Test </h1><br>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<h2 class="text-center card-header">Login</h2>
					<form action="<?php
					 echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
						<div class="form-group">
							<label>username</label>
							<input type="text" name="user" class="form-control" value="">
						</div>
						
						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<center>
							<button type="submit" class="btn btn-primary">Login</button>
						</center>
					</form>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card">
					<h2 class="text-center card-header">Signup</h2>
					<form action="<?php
					 echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div class="form-group">
							<label>username</label>
							<input type="text" name="user1" class="form-control">
							<span class="error"><?php echo $nameerr;?></span>
						</div>
						
						<div class="form-group">
							<label>password</label>
							<input type="password" name="password1" class="form-control">
							<span class="error"> <?php echo $passerr;?></span>
						</div>
						<center>
							<button type="submit" class="btn btn-primary">Signup</button>
						</center>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>