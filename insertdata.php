<?php
//THIS FILE IS FOR PART-II:- https://youtu.be/-yyhzKtG8cg

//Your server name, it will be same for all 000webhost accounts
$servername = "localhost";

//Your DB username
$username = "id13654930_cj_creations";

//Your DB password
$password = "gU6mX<eL->uCnW>G";

//Your DB name, required if you have two DB and want to connect to a specific one
$dbname = "id13654930_cjcreations";

//Connect to MySQL
$mysql = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if($mysql->connect_error){
echo "Connection failed: ". connect_error;
} else {
echo "Connected successfully\n";
}

//Checks that the table exists or not and create a table if not exists one, users is the table name
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($mysql->query($sql) === TRUE) {
  echo "Table MyGuests created successfully\n";
} else {
  echo "Error creating table: " . $mysql->error;
}

//Here we will get firstname of the username from the key 'firstname'
$first_name = $_POST["firstname"];

//Here we will get lastname of the username from the key 'lastname'
$last_name = $_POST["lastname"];

//Here we will get email of the username from the key 'email'
$email = $_POST["email"];

//Insert data into the table, users is the table name
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('$first_name', '$last_name', '$email')";

if ($mysql->query($sql) === TRUE) {
  echo "New record created successfully\n";
} else {
  echo "Error: " . $sql . "<br>" . $mysql->error;
}

?>
