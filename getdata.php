<?php

//THIS FILE IS FOR PART-IV:- https://youtu.be/SgnrZJ52GNU

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

//This will contain a array of your data from database
$result_array = array();

//This will select the specified columns-rows from the database
$sql = "SELECT firstname, lastname, email FROM users ";
    
    /* If there are results from database push to result array */
    $result = $mysql->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    
    /*This will send a JSON encded array to client */
    echo json_encode($result_array);
    $mysql->close();
    
    
?>
