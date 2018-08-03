<!DOCTYPE html>
<html>
  <head>
    <title> Registration Page </title>
  </head>

  <body>
    <form method="post" action="index.php?page=newaccount">
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
