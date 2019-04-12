<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'testdb');
?>
<!DOCTYPE html>
<html>
	<head>
    	<title>Result</title>
		<link rel="stylesheet" href="bootstrap.min.css">
		<style>
         body {
            background-image: url("1.jpg");
            background-color: #cccccc;
            background-size: cover;
            background-repeat: no-repeat;
         }
  	</style>
    </head>
    <body>
    	<div class="container text-center">
	     	<br><br><br><br><br><br><br>
	    	<h1 class="text-center text-success text-uppercase">Your Result</h1>
	    	<div style="padding-left: 0%;">
				<a href="profile.php" class="btn btn-primary"> Profile </a>
			</div>
			<br>
	    	
	        <table class="table text-center table-bordered table-hover">
		      	<tr>
		      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
		      	</tr>
		      	<tr>
				    <td> Questions Attempted </td>
					<?php
						$checked_count = 0;
			         	$Resultans = 0;
			            if(isset($_POST['submit'])) {
			            	if(!empty($_POST['quizcheck'])) {
			            		$checked_count = count($_POST['quizcheck']);
		            ?>

		        	<td> <?php echo "You have attempted " . $checked_count . " out of 20 questions!"; ?> </td>
		        
		          	
		            <?php
			            $selected = $_POST['quizcheck'];
			            $q1= "SELECT * FROM questions";
			            $ansresults = mysqli_query($con, $q1);
			            $i = 1;
			        
			            while($rows = mysqli_fetch_array($ansresults)) {

			            	if (!isset($selected[$i])) {
						   		$selected[$i] = null;
							}
							
			            	$flag = ($rows['ans_id'] == $selected[$i]);
			            	if($flag) $Resultans++;					
			            	$i++;		
			            }
		            ?>
		            	
		    		
		    		<tr>
			    		<td> Your Total Score </td>
			    		<td colspan="2">
					    	<?php 
					            echo "Your score is ". $Resultans;
					            }
					            else echo "
					            <b>You got 0 out of 20!</b>
					            
					            ";
					        } 
					        ?>
				        </td>
		            </tr>

		            <?php 
						$name = $_SESSION['username'];
						$at_q="SELECT attemt FROM login WHERE name='$name' LIMIT 1";
						
						$result=mysqli_query($con,$at_q);
						$row = $result->fetch_assoc();
						$attemt=$row['attemt']+1;
						$at_q="UPDATE login SET attemt=$attemt WHERE name='$name' ";
						mysqli_query($con,$at_q);	
			           	$finalresult = "INSERT INTO user (num_at,username, totalques, answerscorrect) VALUES ($attemt,'$name', '$checked_count', '$Resultans')";
			            $queryresult = mysqli_query($con, $finalresult); 
		            ?>
		            <div style='padding-left: 0%;'>
        				<a href='test.php'>Click here</a> to take the test again.<br>
 					</div>
	        </table>

	      	<a href="logout.php" class="btn btn-warning"> Logout </a>
      </div>
   </body>
</html>