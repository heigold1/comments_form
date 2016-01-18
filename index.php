<html>
<head>

	<title>Comments Form</title>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/main.js"></script>   
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

<div class = "header">  
		<h1>Comments Form</h1>
</div>
<br>

  First Name: <font color="red">*</font> <input type='text' name='first_name' id='first_name' /><label id="first_name_error"></label><br/>
  Last Name: <input type='text' name='last_name' id='last_name' /><label id="last_name_error"></label><br/>

  Email: <font color="red">*</font><input type='text' name='email' id='email' /><label id="email_error"></label><br/>

  Comments:<font color="red">*</font><br />
  <textarea name='comment' id='comments'></textarea><label id="comments_error"></label><br />

  <input type='submit' value='Submit' id="submit_button" />  
  <font color="red" style="italilc"><b>* = required</b></font>

<div class = "header">  
		<h1>Posted Comments</h1>
</div>
<div id="report">

<table border='1' id='main_table'>
<?php

$username = "brent";
$password = "brent";
$hostname = "heigold1.apollomysql.com"; 

//connection to the database
 $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

 $selected = mysqli_select_db($dbhandle, "labroots")
    or die("Could not select tasks");  

 $sql = sprintf(
 	"
    	SELECT  first_name, 
    			last_name, 
    			email, 
    			comments, 
    			date_time
    	FROM feedback
    " 
 );

 $result = mysqli_query($dbhandle, $sql) or die(mysql_error());



echo "	<tr>
			<td>First Name</td><td>Last Name</td><td>Email</td><td>Comments</td><td>Date/Time</td>
		<tr>";

 while ($row = mysqli_fetch_assoc($result)) 
 {
 	echo "<tr>
 			<td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['comments']. "</td><td>" . $row['date_time'] . "</td>
 		  </tr>";

 }

?>

</table>

</div>





</body>
</html>
