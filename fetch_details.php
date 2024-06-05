<?php
// Database connection parameters
$host = '127.0.0.1';  // localhost
$username = 'root'; 
$password = '';
$dbname = 'fyp_game_player';

try {
    // Establish database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get data from players table
    $sql = "SELECT * FROM player ORDER BY playerID ASC";
    
    // Prepare and execute query
    $statement = $pdo->query($sql);
    
    // Fetch data as associative array
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Output data as JSON
    echo json_encode($rows);
} catch(PDOException $e) {
    // Output error message
    echo json_encode(["error" => $e->getMessage()]);
}

// Close the connection
$pdo = null;
?>
