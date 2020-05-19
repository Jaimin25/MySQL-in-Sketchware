<?php
//THIS FILE IS FOR PART-VII:- https://youtu.be/WcMCsf4Ob-U

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

//This will contain a JSON array of your data.
$result_array = array();

//This will contain the order data, means with which type you want to order your data, like firstname or lastname or email
$orderby = $_POST["orderby"];

//This contains the order type, like ascending or descending data
$type = $_POST["type"];
    
//Here all the rows and it's data are selected and then they are ordered as the command is sended with $orderby and $type
$sql = "SELECT firstname, lastname, email FROM users ORDER BY $orderby $type";
    
    /* If there are results from database push to result array */
    $result = $mysql->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    
    /*This sends a JSON encded array to client */
    echo json_encode($result_array);
    
    $mysql->close();
    
    
?>
