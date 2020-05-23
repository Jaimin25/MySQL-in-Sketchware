<?php

//THIS FILE IS FOR PART-IX:- https://youtu.be/LlmIJMP6HCs

header("Access-Control-Allow-Origin: *");
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

if ($mysql->connect_error) {
  echo "Connection failed: " . $mysql->connect_error;
} else {
echo "Connected successfully\n";
}

//This folder will contain your all uploaded files
$target_path = "uploads/";

//Now this contain a path with your filename
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

//This will create a data where all your filename are stored
$table = "CREATE TABLE IF NOT EXISTS files(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(30) NOT NULL
)";

$mysql->query($table);

$filepath = $target_path;

//This will check that the file already exists in the folder or not
if(file_exists($target_path)){
    echo "file already exists with a same name";
} else {

//This will upload file to the path
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    $filename = basename( $_FILES['uploadedfile']['name']);
    
    echo "The file ".  $filename. 
    " has been uploaded";
    
    //This will add the filename into the DB
    $sql = "INSERT INTO files (filename) VALUES ('$filename')";
    if ($mysql->query($sql) === TRUE) {
    echo "New record created successfully<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . $mysql->error;
}
} else{
    echo "There was an error uploading the file, please try again!";
}
}
?>
