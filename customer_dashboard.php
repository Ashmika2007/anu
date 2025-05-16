<?php
session_start();
echo "<h1>Welcome, " . $_SESSION['user_name'] . "!</h1>";
echo "<p>You are logged in as a customer.</p>";
?>
