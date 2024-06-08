<?php
require_once 'config.php';
checkUserAccess('user');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <footer class="bg-white rounded-lg shadow dark:bg-blue1 m-4">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="flex items-center justify-center mb-4">
          <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logo.png" class="h-8"/>
          </a>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 text-center dark:text-gray-400">© 2024 TitaniumTower™<br>Wszystkie prawa zastrzeżone</span>
      </div>
  </footer>
</body>
</html>