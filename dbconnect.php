<?php
$servername = "localhost";
$username = "root";
$password = "root"; // {5LWlpg3AeoZ
// Create connection
$conn = new mysqli($servername, $username, $password, "pickhacks");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
