<?php
session_start();
include 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      $_SESSION['role'] = $user['role'];

      header("Location: index.php");
      exit();
    } else {
      $error = "❌ Incorrect password.";
    }
  } else {
    $error = "❌ No user found with this email.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Healthy Meals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 font-sans min-h-screen flex items-center justify-center p-4">

  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl w-full">
    <!-- Left Image -->
    <div class="md:w-1/2 bg-green-100 flex items-center justify-center p-6">
      <img src="images/llogin.jpg" alt="Healthy Food" class="rounded-full w-64 h-64 object-cover border-4 border-white shadow-md">
    </div>

    <!-- Right Form -->
    <div class="md:w-1/2 w-full p-8">
      <h2 class="text-2xl font-bold text-green-700 mb-6 text-center md:text-left">Log In to Healthys</h2>

      <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm"><?= $error ?></div>
      <?php endif; ?>

      <form method="post" action="">
        <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">

        <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required class="w-full mb-2 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">

        <div class="text-right text-sm mb-4">
          <a href="forgot_password.php" class="text-green-600 hover:underline">Forgot password?</a>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold transition">
          Log In
        </button>
      </form>

      <p class="text-sm text-center mt-4">
        Don't have an account?
        <a href="sign up.php" class="text-green-600 font-medium hover:underline">Sign up here</a>.
      </p>
    </div>
  </div>

</body>
</html>
