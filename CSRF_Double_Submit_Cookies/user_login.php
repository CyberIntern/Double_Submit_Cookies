<!DOCTYPE html>
<html>

<head>
	<title>Cross Site Request Foregery Protection using Double Submit Cookies</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>

<form action="user_contact.php" method="post">

  <div class="imgcontainer">
    <img src="user.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username : sinthu" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password : sinthu" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
  
</form>

</body>

</html>