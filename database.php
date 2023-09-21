<?php
$host = 'localhost'; // Your database host
$dbname = 'sakila'; // Your database name
$dbport = '4408'; // Your database port
$username = 'root'; // Your database username
$password = 'root'; // Your database password
$db;
try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname;port=$dbport", $username, $password);

    // Set PDO attributes for error handling and fetch mode
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   
    // Display a success message
    // echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Handle connection errors
    // echo "Connection failed: " . $e->getMessage();
}
