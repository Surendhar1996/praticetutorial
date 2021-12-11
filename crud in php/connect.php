<?php
$con= new mysqli('localhost','root','','crudoperations');
if(!$con)
{
/*   echo "Database connected successfully";
}
else{  */
 die(mysqli_error($con));
}
?>