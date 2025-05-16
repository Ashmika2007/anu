<?php
$conn = new mysqli("localhost", "root", "", "heathymeals");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// echo "✅ Connected successfully!"; // ← remove or comment this out after testing
?>
