<?php
header('Content-Type: application/json');

if( isset($_GET["user"]))
{
  $user = htmlentities($_GET['user']);
try {
  $conn = new PDO('mysql:host=mydb.cpuioo9gx1rx.us-west-2.rds.amazonaws.com;dbname=myDB', 
  'infor344user', 
  'password');

  $stmt = $conn->prepare('SELECT * FROM Winkling where DeviceID ="' . $user. '"' );
  $stmt->execute();
 
  $result = $stmt->fetchAll();  
  $arr = array();
    if ( count($result) ) {
      foreach($result as $row) {
        $arr[] = $row;
      } 
    }
    //convert the number type from text to number and encode in Json format
    $callback = $_GET['callback'];
    //echo $callback.'('. json_encode($arr,JSON_NUMERIC_CHECK).');';

    echo $callback. json_encode($arr,JSON_NUMERIC_CHECK);

    //echo (json_encode($arr,JSON_NUMERIC_CHECK));
    
  } catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
  }
}
?>