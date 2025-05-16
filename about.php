<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Healthys</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="about.css">
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

 <!-- Banner -->
<section class="relative w-full h-48">
  <!-- Background Image -->
  <img src="images/banner2.jpeg" alt="About Banner" class="w-full h-full object-cover" />

  <!-- Optional dark overlay for better text visibility -->
  <div class="absolute inset-0 bg-black bg-opacity-40"></div>

  <!-- Overlay Text -->
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-4xl font-bold text-white">About Us</h1>
  </div>
</section>

</section>


  <!-- Quality Section -->
  <section class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-8 items-center">
    <img src="images/pexels-nadja-19150339.jpg" class="rounded shadow w-full max-w-sm mx-auto md:mx-0" />

    <div>
      <h2 class="text-2xl font-bold text-orange-600 mb-2">Only quality products for you</h2>
      <p class="text-gray-700 mb-4">
        Welcome to Healthys, where delicious and healthy meals are crafted with care! To make healthy
        eating effortless, delicious, and personalized using chef-crafted meals and cutting-edge
        nutrition science.
      </p>
      <ul class="text-green-700 space-y-2 font-medium list-none">
        <li>⭐ People who want to lose weight;</li>
        <li>⭐ Athletes and those who lead an active lifestyle;</li>
        <li>⭐ Vegetarians and vegans;</li>
        <li>⭐ Fasting;</li>
      </ul>
    </div>
  </section>

  <!-- Stats -->
  <section class="bg-green-100 py-10 px-4">
    <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 text-center gap-6">
      <div><span class="text-2xl font-bold text-blue-900">1200+</span><p class="text-orange-600">Happy Clients</p></div>
      <div><span class="text-2xl font-bold text-blue-900">500+</span><p class="text-orange-600">Order Everyday</p></div>
      <div><span class="text-2xl font-bold text-blue-900">30</span><p class="text-orange-600">Professionals</p></div>
      <div><span class="text-2xl font-bold text-blue-900">645</span><p class="text-orange-600">Working Days</p></div>
    </div>
  </section>

  <!-- Brands -->
  <section class="py-8 px-4 text-center">
    <div class="flex flex-wrap justify-center items-center gap-40">
      <img src="images/logo 1.jpg" class="h-16" />
      <img src="images/logo2.jpg" class="h-16" />
      <img src="images/logo3.png" class="h-16" />
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t py-6 mt-10 text-sm text-gray-600">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
      <div>
        <h4 class="font-bold text-lg">Healthys</h4>
        <p>2025 by healthys</p>
      </div>
      <div>
        <p>081-2072837</p>
        <p>info@mysite.com</p>
      </div>
      <div>
        <ul>
          <li>Privacy policy</li>
          <li>Accessibility</li>
          <li>Terms & condition</li>
          <li>Refund policy</li>
        </ul>
      </div>
      <div>
        <label class="block mb-1">Stay connected with us</label>
        <input type="email" placeholder="Enter Email*" class="border p-2 w-full rounded mb-2" />
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-2" /> I agree to this terms & conditions
        </label>
        <button class="block bg-yellow-500 text-white w-full mt-2 py-2 rounded">Submit</button>
      </div>
    </div>
  </footer>

</body>
</html>
