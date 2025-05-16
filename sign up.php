<?php
include 'db.php';

$success = $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $checkEmail = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($checkEmail);

  if ($result->num_rows > 0) {
    $error = "Email already exists.";
  } else {
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
      $success = "Account created successfully!";
    } else {
      $error = "Error: " . $conn->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up - Healthy Meals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex items-center justify-center min-h-screen font-sans">

  <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-8">
    <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Create Your Account</h2>

    <?php if ($success): ?>
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input type="text" name="name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Sign Up</button>
    </form>

    <p class="text-sm text-center mt-4">
      Already have an account? <a href="login.php" class="text-green-600 font-medium hover:underline">Login here</a>.
    </p>
  </div>

</body>
</html>
