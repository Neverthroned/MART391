<?php
include 'database.php';

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = isset($_GET["username"]) ? htmlspecialchars($_GET["username"]) : "";
$pwd = isset($_GET["pwd"]) ? htmlspecialchars($_GET["pwd"]) : "";

$playerInfo = "";
$sql = "CALL mygame.spCheckLogin('". $username . "','" . $pwd . "');";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ouput data of each row
    while($row = $result->fetch_assoc()) {
        $playerInfo = $row["playerid"];
    }
} else {
    echo "0 Results";
}

$conn->close();

// print out the JSON object based on the array
echo($playerInfo);
?>