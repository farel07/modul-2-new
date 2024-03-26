<?php

// localhost
$hostName = 'localhost';
$username = 'root';
$password = '';
$database_name = 'manage_perusahaan';

$conn = new mysqli($hostName, $username, $password, $database_name);

if($conn->connect_error){
    die("Connection failed ". $conn->connect_error);
}

// $password = password_hash('123', PASSWORD_DEFAULT);
// $query = "INSERT INTO account VALUES('','admin','admin','admin@gmail.com','$password');";

// if ($conn->query($query) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }

//   $conn->close();

$error_message = '';
$success_message = '';



?>