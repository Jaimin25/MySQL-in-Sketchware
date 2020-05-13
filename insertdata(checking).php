<?php

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

//Check that the table exists or not and create a table if not exists one.
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($mysql->query($sql) === TRUE) {
  echo "Table users created successfully\n";
} else {
  echo "Error creating table: " . $mysql->error;
}

$first_name = "";
$last_name = "";
$email = "";

//This function (empty()) will check that if the data inserted are empty or not
if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"])){

echo "Your firstname or lastname or email seems to be empty, please fill all the details.\n";

} else {

//This will contain firstname which will be sended by the API with a key forstname
$first_name = $_POST["firstname"];

//This will contain lastname, received from API with key as lastname
$last_name = $_POST["lastname"];

//This will contain email, where key is email
$email = $_POST["email"];

//This will retrieve all the rows where the firstname is matching with the entered data
$check1 = $mysql->query("SELECT 1 FROM users WHERE firstname = '$first_name' LIMIT 1");

//This will retrieve all the rows where the lastname is matching with the entered data
$check2 = $mysql->query("SELECT 1 FROM users WHERE lastname = '$last_name' LIMIT 1");

//This will retrieve all the rows where the email is matching with the entered data
$check3 = $mysql->query("SELECT 1 FROM users WHERE email = '$email' LIMIT 1");

//Here all the rows are checked and if no match is found than data is submitted
if($check1->fetch_row() || $check2->fetch_row() || $check3->fetch_row()){
echo "Your first name or lastname or email is taken, please try again.\n";
} else {
//Insert data into the table, users is the table name
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('$first_name', '$last_name', '$email')";

if ($mysql->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysql->error;
}

}
}

?>
