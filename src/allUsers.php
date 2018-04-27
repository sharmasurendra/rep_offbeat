<?php
// $myHost = "127.0.0.1"; // use your real host name
// $myUserName = "admin";   // use your real login user name
// $myPassword = "admin";   // use your real login password
// $myDataBaseName = "labProject"; // use your real database name
$myHost = "us-cdbr-iron-east-05.cleardb.net"; 
$myUserName = "b1069ce4ee0339";  
$myPassword = "7ee6e563";   
$myDataBaseName = "heroku_5eaa584d7cda171"; 




$con = mysqli_connect( "$myHost", "$myUserName", "$myPassword", "$myDataBaseName" );
$cumurow = array();
if( !$con ) // == null if creation of connection object failed
{ 
  // echo "111";
    // report the error to the user, then exit program
    // die("connection object not created: ".mysqli_error($con));
} else{
      $result = mysqli_query($con, "Select firstName,lastName from `Users`");
       while ($row = mysqli_fetch_row($result)) {
        array_push($cumurow, $row);
        // $users = $users.",".$row[0];
    }
    echo json_encode($cumurow);
    
}
?>
