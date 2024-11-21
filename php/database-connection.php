<?php
// Database connection details
$host = 'localhost';  // Database host
$dbname = 'billing_program';  // Database name
$username = 'root';  // Database username
$password = '';  // Database password

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    // echo "Database connection established successfully!";
} catch (PDOException $e) {
    // Catch any connection errors
    die("Database connection failed: " . $e->getMessage());
}
?>