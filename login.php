<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname"><br>
  Password: <input type="text" name="fpassword">
  <input type="submit">
</form>
<button type="button" onclick="register.php">Register</button>
<!-- Captcha -->
<form action="?" method="POST">
  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
  <br/>
  <input type="submit" value="Submit">
</form>
<?php
$dongle = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // collect value of input field
    // $captcha = false
    // while(1){
    $name = htmlspecialchars($_REQUEST['fname']);
    $pass = htmlspecialchars($_REQUEST['fpassword']);
    // echo "
    // <script src="recaptcha.js"></script>
    // "
    if (empty($name) || empty($pass)) // || $captcha)
    {
      echo "Login Failed";
    }
    else{
      // NEED TO ADD CODE FOR LOGIN CHECK
      // Add to the SQL Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Store";

      // try{
        $con = mysqli_connect($servername, $username, $password, $dbname) or die("Error you suck " . mysqli_error($con));
        $result1 = mysqli_query($con, "SELECT username FROM Customers WHERE username = '".$name."'");

        if (!$result1) {
          die(mysqli_error($con));
        }

        if(mysqli_num_rows($result1) > 0 )
        {
          $con = null;
          $GLOBALS["dongle"] = true;
        }

        else
        {
          echo 'The username or password is incorrect!';
          $con = null;
        }
      // }
      // catch(PDOException $e){
      //     echo $sql . "<br>" . $e->getMessage();
      // }

      // $con = null;
    }
  // }

}
?>

</body>
</html>
