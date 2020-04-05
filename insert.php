<?php
class Statmentz{
	private $field;
	private $value;
	private $table;
	private $mysqli;

	public function Statmentn($f,$v,$t){
		//creating an array from passed values
		$arr = array($f,$v,$t);

		//intialising class variables with pass values
		$this->field = $arr[0];
		$this->value = $arr[1];
		$this->table = $arr[2];


		//turning passed values from array to string
		$newarr1 = implode(',', $this->field);
		$newarr2 = "'".implode("','", $this->value)."'";
		
		


		//conntecting to the database
		$this->mysqli = new mysqli('localhost','root','','demo');

       if(!empty($this->value)){
       	
		// Prepare an insert statement
        $sql = "INSERT INTO  $this->table ($newarr1) VALUES ($newarr2)";

        if ($this->mysqli->query($sql) === TRUE) {
    header("location: index.php");
    // echo '<script>alert("Record added successfully")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $this->mysqli->error;
}

$this->mysqli->close();
	}
}

}



?>