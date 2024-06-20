
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
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/restaurant.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/degustacja.webp"/>
      </div>
      <div>
        <img class="h-full max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo7.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/offer1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo2.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/roomclassic.jpg"/> 
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/bar1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo5.jpg"/>
      </div>
      <div>
        <img class="h-full max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/restaurant.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/degustacja.webp"/>
      </div>
      <div>
        <img class="h-full max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo7.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/offer1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo2.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/roomclassic.jpg"/> 
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/bar1.jpg"/>
      </div>
      <div>
        <img class="h-auto max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo5.jpg"/>
      </div>
      <div>
        <img class="h-full max-w-full rounded-lg" src="<?= BASE_URL ?>/public/img/photo1.jpg"/>
      </div>
    </div>


    <?php require_once BASE_PATH . '/views/footer.php'; ?>

  </body>
</html>
