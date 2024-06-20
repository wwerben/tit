<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitaniumTower</title>
    <script src="./scripts.js"></script>
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="font-sans overflow-auto scrollbar-hide">
  <?php 
    require_once 'header.php';
  ?>

    <div
      class="w-full h-screen"
      style="background-image: url('img/main.webp'); background-size: cover"
    >
      <div class="h-screen flex justify-center items-center">
        <div
          class="bg-white mx-4 p-8 rounded shadow-md w-full md:w-1/2 lg:w-1/3 "
        >
          <h1 class="text-3xl font-bold mb-8 text-center">Przypomnij hasło</h1>
          <form>
            <div class="mb-4">
              <label class="block font-semibold text-gray-700 mb-2" for="email">
                Adres E-mail
              </label>
              <input
                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                placeholder="Wprowadź adres E-mail"
              />
            </div>
            <div class="mb-4">
              
             
              <a
                class="text-gray-600 hover:text-blue-700 flex justify-center"
                href="#"
                >Zarejestruj się</a
              >
            </div>
            <div class="flex justify-center">
              <a href="home.php?showAlert2=true"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button"
              >
                Potwierdź
              </a>
            </div>
          </form>
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
