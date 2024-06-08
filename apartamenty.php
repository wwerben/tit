<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitaniumTower - Apartamenty</title>
    <script src="./scripts.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-blue1 absolute w-full ">
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-8 w-screen h-screen mx-10 mb-4 ">
            <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
                <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="img/roomclassic.jpg" alt="Apartament1">
                <p class="pt-12 text-center text-gray-700 text-2xl font-bold pb-6 "> Apartament Standard</p>
                <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Price - 100$</div>
                <div class="text-center text-gray-700 text-xl w-3/4">• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum</div>
            </div>
            <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
                <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="img/offer1.jpg" alt="Apartament1">
                <p class="pt-12 text-center text-gray-700 text-2xl font-bold pb-6"> Apartament Deluxe</p>
                <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Price - 150$</div>
                <div class="text-center text-gray-700 text-xl w-3/4">• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum</div>
            </div>
            <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
                <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="img/offer4.jpg" alt="Apartament1">
                <p class="pt-12 text-center text-gray-700  text-2xl font-bold pb-6"> Apartament Suite</p>
                <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Price - 200$</div>
                <div class="text-center text-gray-700 text-xl w-3/4">• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum<br>• Lorem Ipsum</div>
            </div>
        </div>
    </div>

    <?php 
        require_once 'header.php';
    ?>

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
