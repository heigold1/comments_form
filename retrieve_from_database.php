<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = "brent";
$password = "brent";
$hostname = "localhost"; 

//connection to the database
 $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

 $selected = mysqli_select_db($dbhandle, "labroots")
    or die("Could not select tasks");  

$filename = "test2.txt";
$file = fopen( $filename, "w" );
if( $file == false )
{
   echo ( "Error in opening new file" );
   exit();
}

fwrite($file, $first_name);
fclose($file);

  $sql = sprintf
  (
  	"
    	SELECT * 
    	FROM feedback
    ", 
  );

  $result = mysqli_query($dbhandle, $sql) or die(mysql_error());

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) 
  {
     $rows[] = $row;
  }

  print json_encode($rows);











?>






