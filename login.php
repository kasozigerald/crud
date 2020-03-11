<!DOCTYPE html>
<html>
<head>
	<title>login for git</title>
</head>
<body>
<div style="margin:70px 200px;">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

		<input type="text" name="name" placeholder="enter name"><br><br>
		<input type="text" name="course" placeholder="enter course"><br><br>
		<input type="text" name="grade" placeholder="enter grade"><br><br>
		<input type="submit" name="submit" ">
		
	</form>
</div>
</body>
</html>