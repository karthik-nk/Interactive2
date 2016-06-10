<?php
DEFINE ('DB_USER', 'karthik');
DEFINE ('DB_PASSWORD','abc@123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME','karthik');

function OpenDBConnection() {
    $dbc =@mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME)
        OR die('Could not connect to karthikDB'.mysqli_connect_error());   
    if ($dbc->connect_error) {
        die("Connection failed: ".$dbc->connect_error);
    } 
    else{
        return $dbc;        
    }    
}

function closeDBConnection($dbc){
    mysqli_close($dbc);
}
?>