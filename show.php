<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>1231</title>
</head>
<body>

	<?php
		 include('dbcon.php');

		 $q = "SELECT * FROM tbl_accommodation WHERE accom_url = ?";
		 $result = mysqli_connect($conn, $q);

		 if(!$result){

		 	echo "Error". mysqli_error();
		 }else{
		 	?>


		 	<div>
		 		<img src="<?php echo  ?>">
		 	</div>

		 	<?php
		 }



	?>


</body>
</html>