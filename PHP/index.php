<?php require 'login.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Image Album</title>
</head>
<body>
<div style="margin:auto">
  <h1 style="text-align:center">Welcome to our Image Album</h1>
  <p style="text-align:center">To continue, please login with valid credentials</p>
</div>
<br>
<div align="center">
<form action="" method="post" name="Login_Form" style="margin:0 auto;width: 500px">
    <?php if(isset($msg)){?>
      <p align="center"><?php echo $msg;?></p>
    <?php } ?>
      <label for="Username">Username</label>
      <input name="Username" type="text" class="Input"> <br/><br/>
       <label for="Username">Password</label>
      <input name="Password" type="password" class="Input"><br/><br/>
      <input name="Submit" type="submit" value="Login">
</form>
</div>

</body>
</html>