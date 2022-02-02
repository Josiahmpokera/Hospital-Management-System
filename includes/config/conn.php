<?php 
session_start();
$server = 'localhost';
$user = 'root';
$password =  '';
$database = 'hospitals';

//connection to the database
$conn = new mysqli($server,$user,$password,$database);

//Test conection
if(!$conn) {
    echo "Not connected";
}

?>