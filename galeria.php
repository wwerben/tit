<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitaniumTower - Galeria</title>
    <script src="./scripts.js"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="font-sans overflow-auto scrollbar-hide">
  <?php 
    require_once 'header.php';
  ?>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-5 pt-32 px-4 pb-4">
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/restaurant.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/degustacja.webp"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/photo7.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/offer1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/photo2.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/roomclassic.jpg"/> 
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/bar1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/photo5.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="img/photo1.jpg"/>
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
