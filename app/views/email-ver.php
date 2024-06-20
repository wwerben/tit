<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simple Tailwind Starter</title>
  <script src="./scripts.js"></script>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="font-sans overflow-auto scrollbar-hide">
<?php 
    require_once 'header.php';
  ?>


  <div class="w-full h-screen" style="background-image: url('img/main.webp'); background-size: cover">
    <div class="h-3/4 flex justify-center items-center">
        <div class="bg-white rounded shadow-md w-full max-w-md pt-12 pb-12  mx-8 mt-16 mb-6 px-12 flex flex-col items-center">
            <h1 class="text-2xl">Aktywuj konto</h1>
            <h2 class="text-xl mt-8 text-center">Link aktywacyjny został wysłany na podany adres E-mail.</h2>
            <div class="flex justify-start">
                <a href="index.html" class="inline-block mr-2">
                    <button type="button" class="mt-8 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Zatwierdź</button>
                </a>  
            </div>
        </div>
    </div>
</div>
  </div>

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
