<?php
class Statments{
	private $field;
	private $value;
	private $type_init;
	private $table;
	private $mysqli;
	//constant values
	private static $val = array();
	private static $param = array();

	public function Statment($v,$b,$c,$d){
		//creating an array from passed values
		$arr = array($v,$b,$c,$d);

		//intialising class variables with pass values
		$this->field = $arr[0];
		$this->value = $arr[1];
		$this->type_init = $arr[2];
		$this->table = $arr[3];

		
		//turning passed values from array to string
		$newarr1 = implode(',', $this->field);
		$newarr2 = implode(',', $this->value);
		$newarr3 = implode('', $this->type_init);

		//creating a corresponding number of dummy values and turning them into a string
		        for($i = 0; $i < count($this->value); $i++){
				self::$val[$i] = "?";
			      }
			      $vals = implode(',', self::$val);

		//creating a corresponding number of dummy parameter holders and turning them into a string
		        for($i = 0; $i < count($this->type_init); $i++){
				self::$param[$i] = "$param".$i;
			      }
			      print_r(self::$param);
			      //$params = implode(',', self::$param);

		//conntecting to the database
		$this->mysqli = new mysqli('localhost','root','','mega');

       if(!empty($this->value)){
       	
		// Prepare an insert statement
        $sql = "INSERT INTO  $this->table($newarr1) VALUES ($vals)";

        if($stmt = $this->mysqli->prepare($sql)){

			// Bind variables to the prepared statement as parameters
			$stmt->bind_param("$newarr3", self::$param);
		

            // Set parameters
            for($i = 0;  $i < count($this->type_init); $i++){
				self::$param[$i] = $this->value[$i]; 
			}
		
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                //Records created successfully. Redirect to landing page
                header("location: test.php");
                //exit();
            }else{
				echo "Something went wrong. Please try again later.";
				// header("location: create.php");
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