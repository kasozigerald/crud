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

		// print_r($this->value);

		// foreach ($this->value as  $val) {
		// 	if(is_string($val)){
		// 		$stringVal = "'".$val."'".",";
		// 	}
		// }

		//turning passed values from array to string
		$newarr1 = implode(',', $this->field);
		$newarr2 = "'".implode("','", $this->value)."'";
		echo $newarr2;
		


		//conntecting to the database
		$this->mysqli = new mysqli('localhost','root','','mega');

       if(!empty($this->value)){
       	
		// Prepare an insert statement
        $sql = "INSERT INTO  $this->table ($newarr1) VALUES ($newarr2)";

        if ($this->mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: test2.php");
} else {
    echo "Error: " . $sql . "<br>" . $this->mysqli->error;
}

$this->mysqli->close();
	}
}

}



?>