<?php
$myHost = "us-cdbr-iron-east-05.cleardb.net"; 
$myUserName = "b1069ce4ee0339";  
$myPassword = "7ee6e563";   
$myDataBaseName = "heroku_5eaa584d7cda171"; 



$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "b1069ce4ee0339";
$password = "7ee6e563";
//$username = "root";
//$password = "";
$dbname = "heroku_5eaa584d7cda171";



$con = mysqli_connect( "$myHost", "$myUserName", "$myPassword", "$myDataBaseName" );
$cumurow = array();
if( !$con ) // == null if creation of connection object failed
{ 
  // echo "111";
    // report the error to the user, then exit program
    // die("connection object not created: ".mysqli_error($con));
} else{
      $result = mysqli_query($con, "Select first_name,last_name from `User`");
       while ($row = mysqli_fetch_row($result)) {
        array_push($cumurow, $row);
        // $users = $users.",".$row[0];
    }
    echo json_encode($cumurow);
    
}
?>
