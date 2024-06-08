<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TitaniumTower - Kontakt</title>
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
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
          <div
            class="absolute inset-0 bg-gradient-to-r from-blue1 to-blue1 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"
          ></div>
          <div
            class="text-white relative px-4 py-10 bg-blue2 shadow-lg sm:rounded-3xl sm:p-20"
          >
            <div class="text-center pb-6">
              <h1 class="text-3xl">Skontaktuj się z nami!</h1>

              <p class="text-gray-300">
                Uzupełnij poniższy formularz aby wyslać nam wiadomość
              </p>
            </div>

            <form action="https://fabform.io/f/{form-id}" method="post">
              <input
                class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text"
                placeholder="Imię"
                name="name"
              />

              <input
                class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email"
                placeholder="Email"
                name="email"
              />

              <input
                class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text"
                placeholder="Temat"
                name="_subject"
              />

              <textarea
                class="shadow mb-4 min-h-0 appearance-none border rounded h-64 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text"
                placeholder="Napisz swoją wiadomość..."
                name="message"
                style="height: 121px"
              ></textarea>

              <div class="flex justify-between">
                <a href="home.php?showAlert3=true"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                  type="button"
                >
                  Wyślij
                </a>
                <input
                  class="shadow bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                  type="reset"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-white rounded-lg shadow dark:bg-blue1 m-4">
      <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="flex items-center justify-center mb-4">
          <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logo.png" class="h-8" />
          </a>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 text-center dark:text-gray-400">© 2024 TitaniumTower™<br>Wszystkie prawa zastrzeżone</span>
      </div>
  </footer>
  </body>
</html>
