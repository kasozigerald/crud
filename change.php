<?php
include('validate.php');
include('config.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){

	 $table = $_POST['table'];
	 $id = $_POST['id'];
	
	$feedbk = array();
	$val = array();
	$val = $_POST['field'];
	// echo count($_POST['field'])."<br>";

	foreach ($val as $key =>  $value) {
		// $value = mysqli_real_escape_string($value);
		$sql = "UPDATE $table SET  $key = '$value' WHERE id = '$id'";
			if($mysqli->query($sql)){
			$feedbk[] = 1;
		}else{
			$feedbk[] = 0;
		}
		
	}
	


	if((array_sum($feedbk))/(count($_POST['field'])) == 1){
		header("Location: index.php");
		
			}else{
	     header("Location: update.php");
	     echo "Something went wrong";
			}

		

	
}

?>