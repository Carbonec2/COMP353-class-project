<?php

    function console_log( $data ){
      echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      echo '</script>';
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yc353_1";
    
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

      $accInfo = (object)[
        'username'=>$uname,
        'password'=>$pass,
        'Employee_id'=>$employee_id,
        'email'=>$email,
        'phone'=>$phone,
        'firstName'=>$first_name,
        'middleInitial'=>$middle_initial,
        'lastName'=>$last_name
      ];

      console_log($accInfo);

      $result1 = mysqli_query($con, "SELECT username FROM account WHERE username= '".$uname."';");      

      if(mysqli_num_rows($result1) > 0 ){
        echo "<script> alert('Username is taken'); </script>";
        console_log($result1);
      }
      else{
        echo "<script> alert('checkpoint 2'); </script>";

        $accountTDG = new AccountTDG($pdo);
        $accountTDG->insert($accInfo);

        console_log($accountTDG);

        echo "<script> alert('checkpoint 3'); </script>";
        
      }
    }

    $con = null;

?>