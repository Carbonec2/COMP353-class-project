<!DOCTYPE html>
<html>
  <head>
    <title> Registration Page </title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>

  <body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";
    
    $con = new mysqli($servername, $username, $password, $dbname) or die("Failed to connect to MySQL: " . mysql_error());

    if($con->ping()){
      echo "<script> alert('DB Connection successful'); </script>";
    }
    else{
      echo "<script> alert('DB Connection failed'); </script>";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
      echo "<script> alert('checkpoint 1'); </script>";

      $uname = htmlspecialchars($_REQUEST['un']);
      $pass = htmlspecialchars($_REQUEST['pw']);
      $employee_id = htmlspecialchars($_REQUEST['emp_id']);
      $email = htmlspecialchars($_REQUEST['mail']);
      $phone = htmlspecialchars($_REQUEST['pnum']);
      $first_name = htmlspecialchars($_REQUEST['fname']);
      $middle_initial = htmlspecialchars($_REQUEST['mname']);        
      $last_name = htmlspecialchars($_REQUEST['lname']);

      $result1 = mysqli_query($con, "SELECT username FROM account WHERE username= '".$uname."';");

      if(mysqli_num_rows($result1) > 0 ){
        echo "<script> alert('Username is taken'); </script>";
      }
      else{
        $query = "INSERT INTO Account (username, password, Employee_id, email, phone, firstName, middleInitial, lastName) VALUES ('$uname', '$pass', '$employee_id', '$email', '$phone', '$first_name', '$middle_initial', '$last_name')";
        $data = mysqli_query($query) or die("Failed to create account " . mysql_error());
        
        if($data){
          echo "<script> alert('Account created'); </script>";
        }
      }
    }

    $con = null;

    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <table>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="un" required></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="pw" required></td>
        </tr>
        <tr>
          <td>Employee ID:</td>
          <td><input type="text" name="emp_id"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="text" name="mail"></td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td><input type="text" name="pnum"></td>
        </tr>
        <tr>
          <td>First Name:</td>
          <td><input type="text" name="fname"></td>
        </tr>
        <tr>
          <td>Middle Initial:</td>
          <td><input type="text" name="mname"></td>
        </tr>
        <tr>
          <td>Last Name:</td>
          <td><input type="text" name="lname"></td>
        </tr>
        <tr>
          <td><input type="reset" value="Reset"></td>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
      
      </table>
    </form>

  </body>
</html>
