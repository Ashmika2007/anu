<?php
$plan = $_GET['plan'] ?? '';
$email = $_GET['email'] ?? '';
$success = false;
$error = '';

// Handle payment form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pay"])) {
    $name = trim($_POST["cardname"] ?? '');
    $number = trim($_POST["cardnumber"] ?? '');
    $expiry = trim($_POST["expiry"] ?? '');
    $cvv = trim($_POST["cvv"] ?? '');
    $agree = isset($_POST["agree"]);

    if ($name && $number && $expiry && $cvv && $agree) {
        // Save non-sensitive data to simulate
        $log = "Payment for $email | Plan: $plan | Name: $name\n";
        file_put_contents("payments.txt", $log, FILE_APPEND);
        $success = true;
    } else {
        $error = "Please fill all details correctly and accept terms.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Payment - Healthys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="payment.css" />
</head>
<body class="bg-green-50 font-sans">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo">💚 Healthys</div>
    <nav class="space-x-6 hidden md:flex">
      <a href="index.php" class="nav-link">Home</a>
      <a href="about.php" class="nav-link">About</a>
      <a href="meals.php" class="nav-link">Meals</a>
      <a href="subscription.php" class="nav-link">Subscription Plan</a>
    </nav>
    <div class="flex gap-2">
      <a href="login.php" class="btn-primary">Log In</a>
      <a href="cart.php" class="btn-primary bg-yellow-400 hover:bg-yellow-500 text-black">🛒 Cart</a>
    </div>
  </div>
</header>

<!-- Payment Form -->
<main class="max-w-xl mx-auto my-12 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold mb-4 text-center">Payment for Subscription</h2>

  <?php if ($success): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      ✅ Payment Successful! You're subscribed to <strong><?= htmlspecialchars($plan) ?></strong>.
    </div>
  <?php elseif ($error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      ⚠️ <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <?php if (!$success): ?>
  <form method="POST" class="space-y-6">
    <div class="bg-gray-100 p-4 rounded mb-4">
      <p><strong>Plan:</strong> <?= htmlspecialchars($plan) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    </div>

    <div>
      <label for="cardname" class="block mb-1 font-medium">Name on Card</label>
      <input type="text" name="cardname" id="cardname" required
             class="w-full border p-2 rounded" placeholder="John Doe">
    </div>

    <div>
      <label for="cardnumber" class="block mb-1 font-medium">Card Number</label>
      <input type="text" name="cardnumber" id="cardnumber" required
             class="w-full border p-2 rounded" placeholder="1234 5678 9012 3456">
    </div>

    <div class="flex space-x-4">
      <div class="w-1/2">
        <label for="expiry" class="block mb-1 font-medium">Expiration Date</label>
        <input type="text" name="expiry" id="expiry" required
               class="w-full border p-2 rounded" placeholder="MM/YY">
      </div>
      <div class="w-1/2">
        <label for="cvv" class="block mb-1 font-medium">CVV</label>
        <input type="text" name="cvv" id="cvv" required
               class="w-full border p-2 rounded" placeholder="123">
      </div>
    </div>

    <label class="inline-flex items-center text-sm">
      <input type="checkbox" name="agree" required class="mr-2">
      I agree to the terms & conditions
    </label>

    <button type="submit" name="pay" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
      Pay & Subscribe
    </button>
  </form>
  <?php endif; ?>
</main>

<!-- Footer (reused) -->
<footer class="bg-white border-t py-6 mt-10 text-sm text-gray-600">
  <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div>
      <h4 class="font-bold text-lg">Healthys</h4>
      <p>2025 by Healthys</p>
    </div>
    <div>
      <p>081-2072837</p>
      <p><a href="mailto:info@mysite.com" class="hover:underline">info@mysite.com</a></p>
    </div>
    <div>
      <ul>
        <li><a href="#" class="hover:underline">Privacy policy</a></li>
        <li><a href="#" class="hover:underline">Accessibility</a></li>
        <li><a href="#" class="hover:underline">Terms & conditions</a></li>
        <li><a href="#" class="hover:underline">Refund policy</a></li>
      </ul>
    </div>
    <div>
      <form action="index.php" method="POST" novalidate>
        <label class="block mb-1">Stay connected with us</label>
        <input type="email" name="email" placeholder="Enter Email*" required class="border p-2 w-full rounded mb-2" />
        <label class="inline-flex items-center text-sm">
          <input type="checkbox" required class="mr-2" /> I agree to the terms & conditions
        </label>
        <button type="submit" class="block bg-yellow-500 text-white w-full mt-2 py-2 rounded">Submit</button>
      </form>
    </div>
  </div>
</footer>

</body>
</html>
