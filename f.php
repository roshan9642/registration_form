<?php
session_start();
$_SESSION['message']='';
$mysqli = new mysqli('localhost','root','','authentication' );

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	if($_POST['password'] == $_POST['confirmpassword']){
		
		$username = $mysqli->real_escape_string($_POST['username']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$password = md5($_POST['password']);
		
		$_SESSION['username'] = $username;
		
		$sql = "INSERT INTO users(username, email, password)"
				. "VALUES('$username','$email','$password')";
		if($mysqli ->query($sql) === true){
			 $_SESSION['message'] = 'Registration successful';
			header("location: home.php");
		}else{
			$_SESSION['message'] = "user not added to db";
		}
		
	}else{
		$_SESSION['message'] = "no password match";
	}
	
}

?>



<!DOCTYPE html>
<html>
<head>	<title>LPU</title>  </head>

<style>

body, html {
  background-image: url("lpu.jpg");
  background-repeat: repeat-x,y;
  
}

input[type=text],input[type=email],input[type=password],input[type=confirmpassword],input[type=submit]{
  border: 2px solid green;
  border-radius: 4px;
}
</style>

<body>


<div class="body-content">
	<div class="module">
	<h1 align= "center">ALPHA UNIVERSITY</h1>
	<h2 align="center">Register to become a part of our institute</h2>
	<form class="form" method="post" action="f.php">
		<div class="alert alert-error"></div>
		<table align="center">
			<tr>
			
				<td><input type="text" placeholder="UserName" name="username" class="textInput" required /></td>
			</tr>

			<tr>
				
				<td><input type="email" placeholder="Email" name="email" class="textInput" required /></td>
			</tr>

			<tr>
				
				<td><input type="password" placeholder="Password" name="password" class="textInput" required /></td>
			</tr>

			<tr>
				
				<td><input type="password" placeholder="Confirm Password" name="confirmpassword" class="textInput" required /></td>
			</tr>

			<tr align="center">
				<td><input type="submit" name="register" value="Register" class="btn btn-block btn-primary" /></td>
			</tr>
			
			<tr align="center">
				<td>Already a member? <a href="" target="_blank">login</a></td>
			</tr>
		</table>
	</form>
	</div>
 </div>
</body>

</html>