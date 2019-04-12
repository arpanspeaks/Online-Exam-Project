<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header('location:login.php');
	}
	$con = mysqli_connect('localhost', 'root', '', 'testdb');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #696969">
	<div class="container">
		<br><h1 class="text-center text-primary">Test Page</h1><br>
		<h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?> </h2> <br>
		
		<div style="padding-left: 48%;">
			<a href="profile.php" class="btn btn-primary"> Profile </a>
		</div>
		<br>
		<div class="col-lg-12 m-auto d-block">
			<div class="card">
				<h3 class="text-center card-header">You have to select only 1 out of 4 options. Good luck, <?php echo $_SESSION['username']; ?>! :)</h3>
			</div><br>
			<form action="check.php" method="post">
				<?php
					for($i=1; $i<21; $i++) {
						$q = "SELECT * FROM questions WHERE qid = $i";
						$query = mysqli_query($con, $q);
						while($rows = mysqli_fetch_array($query)) {
							?>
							<div class="card">
								<h4 class="card-header"> <?php echo $rows['question'] ?></h4>

								<?php
									$q = "SELECT * FROM answers WHERE ans_id = $i";
									$query = mysqli_query($con, $q);
									while($rows = mysqli_fetch_array($query)) {
										?>
										<div class="card-body">
											<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
											<?php echo $rows['answer']; ?>
										</div>
							<?php
							}
						}
					}
				?>

				<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block"><br>

			</form>
			</div>	
		</div><br>
		<div class="m-auto d-block">
			<a href="logout.php" class="btn btn-warning">Logout</a>
		</div>
		<br><br>
	</div>
</body>
</html>