<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="bg-gray-100 sticky top-0">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between">
        <div class="flex space-x-4">
          <div>
            <a href="index.php" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
              <span class="font-bold">Garbage Collection system</span>
            </a>
          </div>

          <!-- primary nav -->
          <div class="hidden md:flex items-center space-x-1">
            <a href="index.php" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-solid fa-house"></i> Home</a>
            <a href="#about" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-solid fa-book"></i> About</a>
            <a href="#contact" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-solid fa-envelope"></i> Contact</a>
            <a href="./admin/alogin.php" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-regular fa-id-card"></i> Admin</a>
            <a href="./driver/dlogin.php" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-solid fa-car-side"></i> Driver</a>
            <a href="./user/ulogin.php" class="py-5 px-3 text-gray-700 hover:text-blue-600"><i class="fa-solid fa-user"></i> User</a>
          </div>
        </div>

        <div class="hidden md:flex items-center ml-10">
          <input class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" placeholder="Search..." />
          <span class="px-4 py-3 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="text-sm fa-solid fa-magnifying-glass"></i>
          </span>
        </div>
        <!-- mobile button goes here -->
        <div class="md:hidden flex items-center ">
          <button class="mobile-menu-button">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>

      </div>
    </div>
    <!-- mobile menu -->
    <div class="mobile-menu md:hidden hidden">
      <a href="index.php" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-solid fa-house"></i> Home</a>
      <a href="#about" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-solid fa-book"></i> About</a>
      <a href="#contact" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-solid fa-envelope"></i> Contact</a>
      <a href="./admin/alogin.php" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-regular fa-id-card"></i> Admin</a>
      <a href="./driver/dlogin.php" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-solid fa-car-side"></i> Driver</a>
      <a href="./user/ulogin.php" class="block py-2 px-4 text-sm hover:bg-gray-200"><i class="fa-solid fa-user"></i> User</a>
      <div class="block py-2 px-4">
        <input class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" placeholder="Search..." />
        <button class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Search
        </button>
      </div>
    </div>
  </nav>
  <script>
    // grab everything we need
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    // add event listeners
    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>