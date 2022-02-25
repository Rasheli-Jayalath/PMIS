<?php //Connect to MySQL via the PDO object.
include_once("config/config.php");

try {
	$dbCon = $_SESSION["dbConnection"];
			  
			  // set the PDO error mode to exception
			  $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


			  echo "Connected successfully";
			} catch(PDOException $e) {
			  echo "Connection failed: " . $e->getMessage();
			}
	


//Kill the connection with a KILL Statement.
//$dbCon->query('KILL CONNECTION_ID()');

//Set the PDO object to NULL.
$dbCon = NULL;
?>