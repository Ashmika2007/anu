<?php
// Handle email submission
$success = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);

        // Sanitize email before saving
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Save to file safely
        $file = fopen("subscribed_emails.txt", "a");
        if ($file) {
            fwrite($file, $email . PHP_EOL);
            fclose($file);
            $success = true;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Healthy Meals - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="index.css"/>
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
  <!-- Hero Section -->
  <section class="h-[80vh] bg-cover bg-center flex items-center justify-center text-white text-center"
    style="background-image: url('images/home.jpg');">
    <div class="bg-black bg-opacity-60 p-8 rounded">
      <h1 class="text-4xl font-bold mb-2">Healthy Meals Delivered To You</h1>
      <p class="mb-4 italic">Welcome To Healthys!</p>
      <a href="sign up.php" class="btn-primary">Sign Up</a>
    </div>
  </section>

  <!-- Features Icons -->
  <section class="bg-white flex justify-center space-x-6 py-4 text-sm font-medium">
    <div class="flex items-center space-x-2">
      <img src="https://img.icons8.com/color/48/salad.png" class="w-6" alt="Salad icon" />
      <span>Fresh & healthy meals</span>
    </div>
    <div class="flex items-center space-x-2">
      <img src="https://img.icons8.com/color/48/meal.png" class="w-6" alt="Meal icon" />
      <span>Customizable plans</span>
    </div>
    <div class="flex items-center space-x-2">
      <img src="https://img.icons8.com/color/48/delivery.png" class="w-6" alt="Delivery icon" />
      <span>Weekly delivery</span>
    </div>
    <div class="flex items-center space-x-2">
      <img src="https://img.icons8.com/color/48/cheap-2.png" class="w-6" alt="Affordable pricing icon" />
      <span>Affordable pricing</span>
    </div>
  </section>

  <!-- Meal Plan Cards -->
  <section class="bg-green-50 py-10">
    <h2 class="text-2xl font-bold text-center mb-6">Featured Meal Plans</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4">
      <div class="feature-box">
        <img src="images/vegan.jpg" class="plan-image" alt="Vegan Plan"/>
        <h3 class="font-semibold mt-2">Vegan</h3>
        <a href="meals.php" class="btn-primary mt-2 inline-block">View Plan</a>
      </div>
      <div class="feature-box">
        <img src="images/keto.png" class="plan-image" alt="Keto Plan"/>
        <h3 class="font-semibold mt-2">Keto</h3>
        <a href="meals.php" class="btn-primary mt-2 inline-block">View Plan</a>
      </div>
      <div class="feature-box">
        <img src="images/glu.webp" class="plan-image" alt="Gluten-Free Plan"/>
        <h3 class="font-semibold mt-2">Gluten-Free</h3>
        <a href="meals.php" class="btn-primary mt-2 inline-block">View Plan</a>
      </div>
      <div class="feature-box">
        <img src="images/high protein.jpg" class="plan-image" alt="High Protein Plan" />
        <h3 class="font-semibold mt-2">High Protein</h3>
        <a href="meals.php" class="btn-primary mt-2 inline-block">View Plan</a>
      </div>
    </div>
  </section>

  <!-- Testimonial -->
  <section class="bg-white py-10">
    <h2 class="text-xl text-center italic mb-4">Testimonials</h2>
    <div class="max-w-3xl mx-auto bg-gray-100 p-6 rounded shadow text-center">
      <img src="https://img.icons8.com/ios-filled/50/user-male-circle.png" class="w-12 mx-auto mb-2" alt="User icon"/>
      <p class="mb-2 font-medium">The meals are delicious and perfect for my diet!<br>Highly recommended.</p>
      <p class="font-bold">Jamis M.</p>
    </div>
    <div class="text-center mt-6">
      <a href="subscription.php" class="bg-yellow-500 text-white px-6 py-2 rounded font-semibold">Subscribe now</a>
    </div>
  </section>

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
        <?php if ($success): ?>
          <p class="text-green-600 font-medium mb-2">✅ Thank you for submitting!</p>
        <?php endif; ?>
        <form action="index.php" method="POST" novalidate>
          <label for="email" class="block mb-1">Stay connected with us</label>
          <input type="email" id="email" name="email" placeholder="Enter Email*" required class="border p-2 w-full rounded mb-2" />
          <label for="agree" class="inline-flex items-center text-sm">
            <input type="checkbox" id="agree" required class="mr-2" /> I agree to the terms & conditions
          </label>
          <button type="submit" class="block bg-yellow-500 text-white w-full mt-2 py-2 rounded">Submit</button>
        </form>
      </div>
    </div>
  </footer>
</body>
</html>
