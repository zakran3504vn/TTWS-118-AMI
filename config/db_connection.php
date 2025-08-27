<?php
$servername = "localhost";  
$username   = "root";        
$password   = "";            
$dbname     = "118-ami-travel";      

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>