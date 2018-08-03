<?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

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

      console_log($uname);

      $result1 = mysqli_query($con, "SELECT username FROM account WHERE username= '".$uname."';");

      echo "<script> alert('checkpoint 2'); </script>";

      if(mysqli_num_rows($result1) > 0 ){
        echo "<script> alert('Username is taken'); </script>";
      }
      else{
        echo "<script> alert('checkpoint 3'); </script>";

        $query = "SET FOREIGN_KEY_CHECKS=0;";
        $data = mysqli_query($con, $query);

        $query = "INSERT INTO `account` (`username`, `password`, `Employee_id`, `email`, `phone`, `firstName`, `middleInitial`, `lastName`) VALUES ('$uname', '$pass', '$employee_id', '$email', '$phone', '$first_name', '$middle_initial', '$last_name');";
        $data = mysqli_query($con, $query);

        console_log($query);

        echo "<script> alert('checkpoint 4'); </script>";
        
        if($data){
          echo "<script> alert('Account created'); </script>";
        }
        else{
          console_log(mysqli_error($con));
          echo "<script> alert('Account creation failed'); </script>";
        }
      }
    }

    $con = null;

?>