-- Active: 1714187623249@@127.0.0.1@3306@fyp_game_player
<?php
// Database connection parameters
$servername = 'localhost';  
$username = 'root'; 
$password = ''; 
$dbname = 'fyp_game_player';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $playerName = $_POST["player_Name"];
    $gameLvl = $_POST["gamedLvl"];
    $score = $_POST["gScore"];
    $usedTime = $_POST["gameTime"];
    
    // Insert data into players table
    $sql = "INSERT INTO player (playerName, gameLvl, score, usedTime) VALUES ('$playerName', '$gameLvl', '$score', '$usedTime')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
