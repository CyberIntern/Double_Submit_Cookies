<?php

	if(isset($_POST['uname']) && isset($_POST['psw']))
	{
		$uname=$_POST['uname'];
		$psw=$_POST['psw'];

		if (($uname=='sinthu') && ($psw=='sinthu'))
		{
			//echo "USER LOGIN SUCCESSFUL.";	
			session_start();
			$csrf_token_value = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf_token'] = $csrf_token_value;
			$session_id = session_id();
			setcookie('session_cookie',$session_id,time()+60*60*24*30,'/');
			setcookie('csrf_cookie',$_SESSION['csrf_token'],time()+60*60*24*30,'/');
		}

		else
		{
			echo "INVALID LOGIN. PLEASE TRY AGAIN.";
			exit();
		}

	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Cross Site Request Foregery Protection using Double Submit Cookies</title>
	<link rel="stylesheet" href="styles_2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function()
	{
		var name = "csrf_cookie" + "=";
		var cookie_value = "";
		var decoded_cookie = decodeURIComponent(document.cookie);
		var d = decoded_cookie.split(';');
		for(var i = 0; i <d.length; i++) 
		{
			var c = d[i];
			while (c.charAt(0) == ' ') 
			{
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) 
			{
				cookie_value = c.substring(name.length, c.length);
				document.getElementById("csrf_token_hidden").setAttribute('value', cookie_value);
			}
		}
	});
	</script>
</head>

<body>

<div class="container">
  <form action="user_confirmation.php" method="post">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="Sri Lanka">Sri Lanka</option>
      <option value="India">India</option>
      <option value="Singapore">Singapore</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
	
	<input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>

  </form>
</div>

</body>

</html>