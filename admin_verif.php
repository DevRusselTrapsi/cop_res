<?php 

	session_start();

	if (!isset($_SESSION['email'])) {

	header("Location: ./u_a_login.php");
	exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>(resort name) Verification</title>
</head>
<style type="text/css">
	body
	{
		font-family: 'Lato', sans-serif;;
		background-color: lightgrey;
	}
	.navbar
	{
		position: absolute;
		top: 0;
		left: 0;
		background-color: white;
		width: 100%;
		height: 50px;
	}
	.container
	{
		margin-top: 100px;
		border: 1px solid black;
		/*width: 70%;*/
		min-width: 200px;
		max-width: 1200px;
		width: 100%;
		background-color: white;
		display: inline-block;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
	.content > div > img
	{
		height: 70%;
		width: 80%;
		filter: drop-shadow(1px 1px 5px black);
		border: 1px solid black;
	}
	.content
	{
		/*border: 1px solid black;*/
		display: inline-block;
		flex-wrap: wrap;
	}
	
	button[type=submit]{
		background-color: rgba(0, 236, 31, 0.8);
		padding: 15px 50px;
		border-radius: 10px;
		cursor: pointer;
		border: none;
		filter: drop-shadow(1px 1px 5px grey);
		font-weight: bold;

	}
	.btn
	{
		margin-top: 50px;
		margin-bottom: 10px;
	}


</style>
<body>

<nav class="navbar">
	<div>
		<a href="./admin_dash.php"><img src="./assets/img/">
	</div>
</nav>

<div class="container">
	<h1>(resort's Name)</h1>
	<div class="content">
		<div>
			<h2>Business Letter</h2>
		</div>
		<div>
			<img src="./assets/img/tourism.jpg">
		</div>
		
	</div>
	<div class="btn">
		<button type="submit" name="update">Verify</button>
	</div>
</div>


</body>
</html>