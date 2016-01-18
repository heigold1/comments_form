<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = "brent";
$password = "brent";
$hostname = "heigold1.apollomysql.com"; 
             
//connection to the database
 $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

 $selected = mysqli_select_db($dbhandle, "labroots")
    or die("Could not select tasks");  

$filename = "test.txt";
$file = fopen( $filename, "w" );
if( $file == false )
{
   echo ( "Error in opening new file" );
   exit();
}

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$comments = $_GET['comments'];

  $sql = sprintf
  (
  	"
    	INSERT INTO feedback
 		(
    	first_name, 
    	last_name, 
    	email, 
    	comments
    	)
		VALUES 
		(
		'%s', 
		'%s',
		'%s',
		'%s'
		)
    ", 
    $first_name,
    $last_name, 
    $email, 
    addslashes($comments)
    );

  $result = mysqli_query($dbhandle, $sql) or die(mysql_error());


fwrite($file, $first_name);
fclose($file);


$return_array = array();
$return_array['return_value'] = "Comments inserted successfully";

print json_encode($return_array);







?>






