<?php
//THIS FILE IS FOR PART-I:- https://youtu.be/3MotOERTW7I

//Your server name, it will be same for all 000webhost accounts
$servername = "your_servername";

//Your DB username
$username = "your_database_username";

//Your DB password
$password = "your_database_password";

//Your DB name, required if you have two DB and want to connect to a specific one
$dbname = "your_database_name";

//Connect to MySQL
$mysql = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if($mysql->connect_error){
echo "Connection failed: ". $mysql->connect_error;
} else {
echo "Connected successfully";
}

?>
