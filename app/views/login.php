<?php 
require_once dirname(__DIR__) . '../config/config.php';


?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitaniumTower - Logowanie</title>
    <script src="<?= BASE_URL ?>/views/js/scripts.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/app/views/css/style.css" />
    <style>
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('<?= BASE_URL ?>/public/img/main.webp') no-repeat center center;
            background-size: cover;
            z-index: -1;
            background-color: rgba(244, 244, 244, 40);
        }
    </style>
  </head>

  <body class="font-sans overflow-auto scrollbar-hide">
    <?php require_once 'header.php'; ?>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl shadow-md w-full md:w-1/2 lg:w-1/3">
            <h1 class="text-3xl font-bold mb-8 text-center">Panel logowania</h1>
            <form action="index.php?action=login" method="post">
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2" for="email">Adres E-mail</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" required id="email">
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-700 mb-2" for="password">Hasło</label>
                    <input class="border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="pass" required id="pass">
                    <a class="text-gray-600 hover:text-blue3 flex justify-center" href="forgotpassword.php">Zapomniałeś hasła?</a>
                    <a class="text-gray-600 hover:text-blue3 flex justify-center" href="index.php/?action=registerForm">Zarejestruj się</a>
                </div>
                <div class="flex justify-center">
                    <input type="submit" class="bg-blue1 hover:bg-blue2 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline" value="Zaloguj">
                </div>
            </form>
        </div>
    </div>

    <?php require_once BASE_PATH . '/views/footer.php'; ?>
</body>
</html>

   