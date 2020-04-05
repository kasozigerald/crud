<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Little diamonds admin</title>

  <!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet"> 

</head>

<body id="page-top">
    <div class="row justify-content-center mt-5">
        <div class="col-8 text-left text-success">
            <h2 class="font-weight-bold">View record</h2>
        </div>
        <div class="col-md-8 pt-5 text-justify card-body">

    



<?php


    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
//echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';

 $tables = explode('?', $escaped_url);
 $tables2 = explode('/', $tables[1]);

    
    function view($ids,$tables,$fields ){


        $val = explode('/', $_SERVER['HTTP_REFERER']);
$no = count($val);
$page = $val[$no-1];

        require_once 'config.php';

        $sql = "SELECT * FROM $tables WHERE $fields = $ids";

        if($result = $mysqli->query($sql)){

        if($result->num_rows > 0){

                $row = $result->fetch_array(MYSQLI_ASSOC);              

                echo '
                <div>
                 <table  class="table table-borderless">
                              <tbody>';
                              

                foreach ($row as $key => $value) {
                    echo '
                      <tr> <th>'.strtoupper($key).'</th>';

                    if($key == "image" || $key == "file"){

                      echo'<td><img style="width:100px; height:100px;" src="../'.$value.'"></td></tr>';
                      

                      }else{

                      echo'<td>'.$value.'</td></tr>';
                              }

                }

                echo '
                </tbody>
                              </table>
                              </div>';

                echo '<a href="'.$page.'" class="btn btn-success btn-sm mt-5" style="width:100px;">back</a>';
              
        }
        
    }

}

view($tables2[1],$tables2[2],$tables2[0]);

?>

</div>
    </div>
</body>

</html>
