<br/>
<br/>
<div class="container">
<div align="right">
<a href="src/logout.php" class="btn btn-default btn-sm">
    <span class="glyphicon glyphicon-log-out"></span> Log out
</a>
</div>

<h3> List of Registred Users on Buy-Trade-Sell</h3> 
<br/>
<div class="table-responsive">     


     
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
	<?php

	$sourceFile = file_get_contents('../resources/text/users.txt');
	$fileContents = explode("\n", $sourceFile);	

	foreach($fileContents as $value) {
		$users = explode(" ", $value);
		echo "<tr><td>$users[0]</td><td>$users[1]</td><td>$users[2]</td><td>$users[3]</td><td>$users[4]</td><td>$users[5]</td></tr>";
	}
?>
      
	  
    </tbody>
  </table>
  </div>

</div>
<br/>
<br/>
<br/>