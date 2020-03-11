<?php
class Statments{
	private $field;
	private $value;
	private $type_init;
	private $table;
	private $mysqli;
	$arr = array($v,$b,$c,$d );

	public function Statment($v,$b,$c,$d){
		
		$this->field = $v;
		$this->value = $b;
		$this->type_init = $c;
		$this->table = $d;
		
		$this->mysqli = new mysqli('localhost','root','','mega');
       if(!empty($this->value)){
       	$table_name = $this->table;
        // Prepare an insert statement
        $sql = "INSERT INTO $table_name ($this->field) VALUES (?)";

        if($stmt = $this->mysqli->prepare($sql)){
        	echo "yes baby";
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("$this->type_init", $param_value);
            
            // Set parameters
            $param_value = $this->value;
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: test.php");
                //exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        //Close statement
        $stmt->close();
    }
    
    //Close connection
    $this->mysqli->close();

		}
	}




?>






<?php
include('mega.php');
if(isset($_POST["submit"])){
$names = $_POST["name"];
$course = $_POST["course"];
$grade = $_POST["grade"];
$mega = new Statments();
$mega->Statment('name',$names,'s','test1');
$mega->Statment('course',$course,'s','test1');
$mega->Statment('grade',$grade,'s','test1');
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