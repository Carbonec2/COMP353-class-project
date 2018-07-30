
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname" id="username"><br>
  Password: <input type="text" name="fpassword" id="password">
  <input type="submit" id="formSubmit">
</form>
<button type="button" onclick="register.php">Register</button>
<!-- Captcha -->

<!--
<form action="?" method="POST">
  <div class="g-recaptcha" data-sitekey="your_site_key"></div>
  <br/>
  <input type="submit" value="Submit">
</form>
-->