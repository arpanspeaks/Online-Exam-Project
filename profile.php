<?php
  session_start();
  if(!isset($_SESSION['username'])) {
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html>
<style>

#look {
  font-family: "Trebuchet MS";
  border-collapse: collapse;
  width: 80%;
  margin: auto;
}

#look td, #look th {
  border: 1px solid #ddd;
  padding: 8px;
}

#look tr:nth-child(odd){background-color: #A9A9A9;}
#look tr:nth-child(even){background-color: #F0F8FF;}

#look tr:hover {background-color: #ddd;}

#look th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: middle;
  background-color: #4CAF50;
  color: white;
}

</style>
<head>
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
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
  <br><h1 class="text-center text-primary">Profile Page</h1>
  <h2 class="text-center text-success">Here you can see your previous test results, <?php echo $_SESSION['username']; ?> </h2> <br>
  <table id="look">
    
    <?php
      $con = mysqli_connect('localhost', 'root', '', 'testdb');

        $name = $_SESSION['username'];
        $at_q="SELECT attemt FROM login WHERE name='$name' LIMIT 1";
        
        $result=mysqli_query($con,$at_q);
        $row = $result->fetch_assoc();
        $attemt=$row['attemt'];
        if ($attemt == 0) {
            echo "<br><br><br>
            <div style='padding-left: 38%;'><h2>You have not attempted yet!</h2></div>";
        }
        else {
          echo "
          <tr>
            <th>Attempt Number</th>
            <th>Questions Attempted</th>
            <th>Marks</th>
          </tr>";
          for($i=1; $i<=$attemt; $i++) {
              $q = "SELECT * FROM user WHERE username = '$name' && num_at = $i LIMIT 1";
              $r = mysqli_query($con,$q)->fetch_assoc();
              echo "<tr><td>" . $i . "</td>";
              echo "<td>" . $r['totalques'] . "</td>";
              echo"<td>" . $r['answerscorrect'] . "</td></tr>";
          }
        }
        
    ?>
  </table>
</body>
  <br>
  <div style="padding-left: 42%;">
        <a href="home.php">Click here</a> to go back to the home page.
  </div>
  <br>
  <div style="padding-left: 47%;">
        <a href="logout.php" class="btn btn-warning">Logout</a>
  </div>

</html>