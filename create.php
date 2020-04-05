<?php
include('insert.php');
include('validate.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = validate::validate_name($_POST["name"]);
$course =  validate::validate_string($_POST["course"]);
$grade =  validate::validate_digits($_POST["grade"]);

if(validate::errors() == true){

$field = array('name','course','grade');
$value = array($name ,$course,$grade);
$mega = new Statmentz();
$mega->Statmentn($field,$value,'student');

}else{
    echo "<div class='text-danger font-wheight-bold h3'>There is some error in your input</div>";
    echo "<div class='p-5'>".validate::error_log()."</div>";
}

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
     <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!--jquery-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!--custom js/jquery-->
      <script src="main.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Fill the form below</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="sub">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php if(isset($_POST["name"])) echo $name; else echo "";?>">
                            <small id="name_err"></small>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course" id="course" class="form-control" value="<?php if(isset($_POST["course"])) echo $course; else echo "";?>">
                            <small id="course_err"></small>
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" name="grade" id="grade" class="form-control" value="<?php if(isset($_POST["grade"])) echo $grade; else echo "";?>">
                            <small id="grade_err"></small>
                        </div>
                        <input type="submit" id="sub" name="submit" class="btn btn-success" value="Submit">
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
