
<?php
//echo $_SERVER["SCRIPT_FILENAME"];
$vals = explode('/', $_SERVER['HTTP_REFERER']);
$no = count($vals);
$page = $vals[$no-1];
//echo $page;


$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
// echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';

 $val = explode('?', $escaped_url);
 $val1 = explode('/', $val[1]);

    
    $id = $val1[1];
    $table = $val1[2];
    $field = $val1[0];

   echo $id." ".$table. " ". $field;
    


    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "DELETE FROM $table WHERE $field = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = trim($id);
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: ". $page);
            exit();

        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    } 
     
    // Close statement
    // $stmt->close();
    
    // Close connection
    $mysqli->close();
// 
?>
