<?php 
session_start(); 
include("db.php");
?>
<?php

if (isset($_POST['sign_button'])){
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password0 = $_POST['password0'];
	$password1 = $_POST['password1'];
	$errors = array();
	
	if (empty($username)){
		array_push($errors, "Username is required");
	}
	if (empty($email)){
		array_push($errors, "Email is required");
	}
	if (empty($password0) || empty($password1)){
		array_push($errors, "Password is required");
	}else{
		if ($password0 != $password1){
			array_push($errors, "The passwords do not match");
		}
	}

	if (count($errors) == 0){
		// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		try{
			$sql_insert = "INSERT INTO users (username, email, password) VALUES
							(:username, :email, :password)";

			$statement = $db->prepare($sql_insert);
			$statement->execute(array(':username' => $username, ':email' => $email, ':password' => $password1));
            echo "YES";
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged in";
			header('location: home.php');
		}catch (PDOException $ex){
			echo "An 'ERROR' occurred " .$ex->getMessage();
		}
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
       	   			<li><a href="index.php">Login</a></li>
       	 		</ul>
     		</nav>
   	 	</div>
 		</header>
		<div class="card-container">
		<div class="lower-container">
			<img src="imgs/logo.jpeg" class="logo3"/>
			<form class="login_form" action="signup.php" method="post">
				<?php include('errors.php');?>
				<label><b>Username:</label><br>
				<input type="text" class="inputvalues" name="username" placeholder="type your username"/><br>
				<label><b>Email:</label><br>
				<input type="email" class="inputvalues" name="email" placeholder="type your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/><br>
				<label><b>Password:</label><br>
                <input type="password" class="inputvalues" name="password0" placeholder="type your password"/><br>
                <label><b>Confirm Password:</label><br>
				<input type="password" class="inputvalues" name="password1" placeholder="confirm your password"/><br>
				<input type="submit" id="confirm_button" name="sign_button" value="Signup"/><br>
				<!-- <input type="button" id="back_login_button" value="Back"/><br> -->
			</form>
		</div>
		</div>
	</body>
</html>