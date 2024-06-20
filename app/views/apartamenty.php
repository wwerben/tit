
<?php
require_once dirname(__DIR__) . '../config/config.php';



require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controllers/controller.php';

?>

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
<?php 
        require_once 'header.php';
    ?>
    <body class="bg-blue1 absolute w-full ">
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-8 w-screen h-screen mx-10 mb-4 ">
        <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
        <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="<?= BASE_URL ?>/public/img/roomclassic.jpg" alt="Apartament1">
        <p class="pt-12 text-center text-gray-700 text-2xl font-bold pb-6 ">Standard</p>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Koszt - 200PLN za dobę</div>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-12">• Łóżko podwójne <br> • Telewizor LCD <br> • Prysznic <br> • Klimatyzacja <br> • Minibar <br>• Ekspres do kawy<br> • Wi-Fi</div>
       
    </div>
 
    <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
        <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="<?= BASE_URL ?>/public/img/offer1.jpg" alt="Apartament1">
        <p class="pt-12 text-center text-gray-700 text-2xl font-bold pb-6">Deluxe</p>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Koszt - 300PLN za dobę</div>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-12">• Łóżko King Size <br> • Smart TV <br> • Wanna i prysznic <br> • Klimatyzacja <br> • Minibar <br> • Ekspres do kawy <br> • Wi-Fi
        </div>
    
    </div>
 
    <div class="col-span-1 bg-white p-4 shadow-md flex flex-col items-center pt-36">
        <img class="object-cover w-60 h-60 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="<?= BASE_URL ?>/public/img/offer4.jpg" alt="Apartament1">
        <p class="pt-12 text-center text-gray-700  text-2xl font-bold pb-6">Suite</p>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-6">Koszt - 500PLN za dobę</div>
        <div class="text-center text-gray-700 text-xl w-3/4 pb-12">• Łóżko King Size <br> • Smart TV / Projektor <br> • Wanna z hydromasażem i prysznic <br> • Klimatyzacja <br> • Minibar <br> • Ekspres do kawy <br> • Balkon
        </div>
       
 
        </div>
    </div>
    </div>
   
 
    <?php 
        require_once './footer.php';
    ?>
</body>
</html>
   


