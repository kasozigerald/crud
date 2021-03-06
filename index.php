<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
</style>
<script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">Student Details</h2>
<a href="create.php" class="btn btn-success pull-right">Add New Student</a>
</div>
 <?php
// Include config file
require_once 'config.php';
                    
// Attempt select query execution
$sql = "SELECT * FROM student";
if($result = $mysqli->query($sql)){
 if($result->num_rows > 0){
   echo "<table class='table table-bordered table-striped'>";
    echo "<thead>";
    echo "<tr>";
         echo "<th>#</th>";
 echo "<th>Name</th>";
 echo "<th>Course</th>";
 echo "<th>Grade</th>";
 echo "<th>Action</th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>";
 while($row = $result->fetch_array()){
echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['course'] . "</td>";
 echo "<td>" . $row['grade'] . "</td>";
 echo "<td>";
 echo "<a href='readtest.php?id/". $row['id'] ."/student' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open text-success'></span></a>";
  echo "<a href='update.php?id/". $row['id'] ."/student' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil text-primary'></span></a>";
   echo "<a href='delete.php?id/". $row['id'] ."/student' title='this record will be deleted' bg-danger data-toggle='tooltip'><span class='glyphicon glyphicon-trash text-danger'></span></a>";
    echo "</td>";
    echo "</tr>";
      }
    echo "</tbody>";                           echo "</table>";
            // Free result set
    $result->free();
     } else{
    echo "<p class='lead'><em>No records were found.</em></p>";
        }
     } else{
      echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>