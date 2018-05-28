<?php

require_once 'csrf_token.php';


$csrf_value = $_POST["csrf_token"];


if(isset($_POST['firstname']))
{
	if(csrf_token::check_csrf_token($csrf_value,$_COOKIE['csrf_cookie']))
	{
		
		echo "<font color='green' size='6'>Thank You for Your Information, </font>".$_POST['firstname']." ".$_POST['lastname']." from ".$_POST['country'];	
		
	}
	else
	{
		echo "<font color='red' size='12'> Cross-Site Request Forgery Attack is successfully ELIMINATED using Double Submit Cookies </font>";
	}
}

?>