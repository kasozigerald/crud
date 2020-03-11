<?php
include('work2.php');

if(isset($_POST["submit"])){

$names = $_POST["name"];
$course = $_POST["course"];
$grade = $_POST["grade"];

$field = array('name','course','grade');
$value = array($names ,$course,$grade);
$mega = new Statmentz();
$mega->Statmentn($field,$value,'test1');

}
?>

<div style="margin:70px 200px;">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

		<input type="text" name="name" placeholder="enter name"><br><br>
		<input type="text" name="course" placeholder="enter course"><br><br>
		<input type="text" name="grade" placeholder="enter grade"><br><br>
		<input type="submit" name="submit" ">
		
	</form>
</div>



