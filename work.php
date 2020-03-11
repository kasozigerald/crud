<?php
//this is how to write a prepared statement

/*

$name = $_POST['name'];
$address = $_POST['address'];
$marks = $_POST['marks'];


$sql = insert into tablename(fiel1,field2,field3) values(?,?,?);

$smt = $mysqli->prepare($sql);

$mt->bind_pram('sss', $param1,param2,param3);

$param1 = $name;
$param2 = $address;
$param3 = $marks;
7
$smt->execute();

$smt->close();

$mysqli->close();

*/
?>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


