<?php 
session_start(); 
include("db.php");
?>
<?php
$msg = ""; 
if(isset($_POST['log_button'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if($username != "" && $password != "") {
		try {
			$query = "select * from `users` where `username`=:username and `password`=:password";
			$stmt = $db->prepare($query);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->bindValue('password', $password, PDO::PARAM_STR);
			$stmt->execute();
			$count = $stmt->rowCount();
			$row   = $stmt->fetch(PDO::FETCH_ASSOC);
			if($count == 1 && !empty($row)) {
				/******************** Your code ***********************/
				$_SESSION['sess_user_id']   = $row['id'];
				$_SESSION['sess_username'] = $row['username'];
				$_SESSION['sess_name'] = $row['name'];
				header('location:home.php');
			} else {
				$msg = "Invalid username and password!";
			}
		} catch (PDOException $e) {
			echo "Error : ".$e->getMessage();
		}
	} else {
		$msg = "Both fields are required!";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body style="background-color:#3dc1d3">
		<header>
    		<div class="container1">
			  <img src="imgs/logo.jpeg" class="logo2"/>
    	 	 <h1 class="logo1">Camagru</h1>

     	 	<nav>
      	  		<ul>
       	   			<li><a href="signup.php">Signup</a></li>
       	 		</ul>
     		</nav>
   	 	</div>
 		</header>
		<div class="card-container">
		<div class="lower-container">
			<img src="imgs/logo.jpeg" class="logo3"/>
			<form class="login_form" action="index.php" method="post">
				<label><b>Username:</label><br>
				<input type="text" class="inputvalues" name="username" placeholder="type your username"/><br>
				<label><b>Password:</label><br>
				<input type="password" class="inputvalues" name="password" placeholder="type your password"/><br>
				<input type="submit" id="login_button" name="log_button" value="Login"/><br>
				<!--<input type="button" id="signup_button" value="Signup"/><br> -->
			</form>
		</div>
		</div>
	</body>
</html>

