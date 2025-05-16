<?php
session_start();

// Handle add to cart from meals.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mealName = $_POST['meal_name'] ?? '';
    $mealPrice = $_POST['meal_price'] ?? '';

    if (!empty($mealName) && is_numeric($mealPrice)) {
        $_SESSION['cart'][] = [
            'name' => htmlspecialchars($mealName),
            'price' => floatval($mealPrice)
        ];
        header("Location: cart.php");
        exit();
    }
}

// Handle clear cart
if (isset($_GET['clear']) && $_GET['clear'] === '1') {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your Cart - Healthys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 font-sans">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo font-bold text-xl text-green-700">💚 Healthys</div>
    <nav class="space-x-6 hidden md:flex">
      <a href="index.php" class="nav-link">Home</a>
      <a href="about.php" class="nav-link">About</a>
      <a href="meals.php" class="nav-link">Meals</a>
      <a href="subscription.php" class="nav-link">Subscription Plan</a>
    </nav>
    <a href="login.php" class="btn-primary">Log In</a>
  </div>
</header>

<!-- Cart Content -->
<div class="max-w-4xl mx-auto my-12 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold mb-4 text-center">🛒 Your Cart</h2>

  <?php if (empty($cartItems)): ?>
    <p class="text-center text-gray-600">Your cart is empty. Go to <a href="meals.php" class="text-green-600 underline">Meals</a> to add some!</p>
  <?php else: ?>
    <table class="w-full text-left border-collapse mb-6">
      <thead>
        <tr>
          <th class="border-b p-2">Meal</th>
          <th class="border-b p-2">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cartItems as $item): ?>
          <tr>
            <td class="border-b p-2"><?= htmlspecialchars($item['name']) ?></td>
            <td class="border-b p-2">$<?= number_format($item['price'], 2) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p class="text-right font-bold text-lg mb-4">Total: $<?= number_format($total, 2) ?></p>
    <div class="flex justify-between">
      <a href="?clear=1" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Clear Cart</a>
      <a href="payment.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Proceed to Payment</a>
    </div>
  <?php endif; ?>
</div>

<!-- Footer -->
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
      <label class="block mb-1">Stay connected with us</label>
      <input type="email" placeholder="Enter Email*" class="border p-2 w-full rounded mb-2" />
      <label class="inline-flex items-center text-sm">
        <input type="checkbox" class="mr-2" /> I agree to terms & conditions
      </label>
      <button class="block bg-yellow-500 text-white w-full mt-2 py-2 rounded">Submit</button>
    </div>
  </div>
</footer>

</body>
</html>
