<?php 
session_start();
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
	
     
} else { 
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile Card</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header>
    	<div class="container1">
		  <img src="imgs/logo.png" class="logo2"/>
    	  <h1 class="logo1">Camagru</h1>

     	 <nav>
      	  <ul>
       	   <li><a href="gallary.php">Gallery</a></li>
       	   <li><a href="logout.php">Logout</a></li>
       	 </ul>
     	 </nav>
   	 </div>
 	</header>
	<div class="card-container">

		<div class="upper-container">
			<div class="image-container">
				<img src="imgs/user.png" />
			</div>
		</div>

		<div class="lower-container">
			<div>
				<h3>Welcome Back</h3>
				<?php echo '<h4>'.$_SESSION['sess_name'].' </h4>'; ?>
			</div>
			<div>
				<p>Post and share memories with your friends and family</p>
			</div>
			<div>
				<a href="gallary.php" class="btn">Gallery</a>
			</div>
		</div>

	</div>

</body>
</html>