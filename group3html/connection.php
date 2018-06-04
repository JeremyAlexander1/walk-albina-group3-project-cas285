
<?php
 
 
function Connect()
{
 $dbhost = "localhost";
 $dbuser = "thealexa_albina_user";
 $dbpass = "UzEvktQe3Tqxu!";
 $dbname = "thealexa_albina";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?>