<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Titanium Tower</title>
    <script src="./scripts.js"></script>
  </head>
  <body class="font-sans overflow-auto scrollbar-hide ">
    
    <?php 
      require_once 'header.php';
      require_once 'config.php';
    ?>
    
    <div class="w-full">
      <div class="w-full">
        <div class="bg-black w-full h-screen opacity-30 absolute"></div>
        <img src="./img/main.webp" alt="Zdjęcie hotelu" class="w-full h-screen relative object-cover"/>
      </div>

      <!--ALERTY -->
      <body class="bg-gray-100 relative h-screen">
        <div role="alert" id="alert-box" class="absolute left-1/2 transform -translate-x-1/2 top-40 flex justify-center max-w-md px-4 py-4 text-base text-black bg-white rounded-lg hidden">
          <div class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
            </svg>
          </div>
          <div class="ml-3 mr-12">Pomyślnie wylogowano</div>
        </div>
        <div role="alert1" id="alert-box1" class="absolute left-1/2 transform -translate-x-1/2 top-40 flex justify-center max-w-md px-4 py-4 text-base text-black bg-green-500 rounded-lg hidden">
          <div class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
            </svg>
          </div>
          <div class="ml-3 mr-12">Pomyślnie zarejestrowano</div>
        </div>
        <div role="alert2" id="alert-box2" class="absolute left-1/2 transform -translate-x-1/2 top-40 flex justify-center max-w-md px-4 py-4 text-base text-black bg-white rounded-lg hidden">
          <div class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
            </svg>
          </div>
          <div class="ml-3 mr-12 text-center">Link resetujący hasło, został wysłany na podany adres e-mail</div>
        </div>
        <div role="alert3" id="alert-box3" class="absolute left-1/2 transform -translate-x-1/2 top-40 flex justify-center max-w-md px-4 py-4 text-base text-black bg-green-500 rounded-lg hidden">
          <div class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path>
            </svg>
          </div>
          <div class="ml-3 mr-12 text-center">Pomyślnie wysłano wiadomość <br> Wkrótce się z Toba skontaktujemy</div>
        </div>

      <div class="h-auto flex justify-center">
        <svg
          height="210"
          class="m-20"
          width="1.8"
          xmlns="http://www.w3.org/2000/svg"
        >
          <line
            x1="0"
            y1="0"
            x2="0"
            y2="200"
            style="stroke: black; stroke-width: 14"
          />
        </svg>
      </div>

      

      <div class="max-w-screen-2xl mb-24 mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Oferty Promocyjne</h2>
        <div class="grid md:grid-cols-4 gap-6">
          <!-- Offer 1 -->
          <div class="shadow-lg overflow-hidden">
            <img
              src="./img/offer1.jpg"
              alt="Przystępny Luksus"
              class="w-full h-64 object-cover"
            />
            <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Przystępny Luksus</h3>
              <p class="text-sm text-gray-600">
                Zarezerwuj teraz przez strone i uzyskaj 15% rabatu!
              </p>
            </div>
          </div>
          <!-- Offer 2 -->
          <div class="shadow-lg overflow-hidden">
            <img
              src="./img/offer2.jpg"
              alt="Doświadcz Panoramy"
              class="w-full h-64 object-cover"
            />
            <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Doświadcz Panoramy</h3>
              <p class="text-sm text-gray-600">
                Weekend z widokiem na panorame Warszawy
              </p>
            </div>
          </div>
          <!-- Offer 3 -->
          <div class="shadow-lg overflow-hidden">
            <img
              src="./img/offer3.jpg"
              alt="Kobieta w spa"
              class="w-full h-64 object-cover"
            />
            <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Chwila relaksu</h3>
              <p class="text-sm text-gray-600">
                Pakiety spa premium taniej o 50%
              </p>
            </div>
          </div>
          <!-- Offer 4 -->
          <div class="shadow-lg overflow-hidden">
            <img
              src="./img/offer4.jpg"
              alt="Oferty w restauracji"
              class="w-full h-64 object-cover"
            />
            <div class="p-4">
              <h3 class="font-bold text-lg mb-2">Restauracyjne Rabaty</h3>
              <p class="text-sm text-gray-600">
                Codziennie nowe oferty w naszej hotelowej restauracji
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="w-full h-auto bg-beige2">
        <div class="max-w-screen-2xl mx-auto py-12 px-4">
          <h2 class="text-3xl font-bold text-center mb-8">Nasza oferta</h2>
          <div class="flex flex-wrap justify-between items-start">
            <div class="w-full md:w-1/2 p-4">
              <img
                src="./img/roomclassic.jpg"
                alt="Exquisitely designed"
                class="w-full h-auto object-cover rounded shadow-lg mb-4"
              />
              <h3 class="text-xl font-bold mb-2">Apartamenty Deluxe</h3>
              <p class="text-sm text-gray-600">
                Elegancja i Komfort na Najwyższym Poziomie
              </p>
            </div>

            <div class="w-full md:w-1/2 p-4">
              <img
                src="./img/room2.jpg"
                alt="Beautiful spaces fit for royalty"
                class="w-full h-auto object-cover rounded shadow-lg mb-4"
              />
              <h3 class="text-xl font-bold mb-2">
                Sale konferencyjne z widokiem
              </h3>
              <p class="text-sm text-gray-600">
                Twoje miejsce spotkań biznesowych
              </p>
            </div>
            <div class="w-full md:w-1/2 p-4">
              <img
                src="./img/restaurant.jpg"
                alt="Beautiful spaces fit for royalty"
                class="w-full h-auto object-cover rounded shadow-lg mb-4"
              />
              <h3 class="text-xl font-bold mb-2">
                Luksusowa restauracja z widokiem
              </h3>
              <p class="text-sm text-gray-600">
                Niezapomniane kolacje z najpiękniejszymi widokami
              </p>
            </div>
            <div class="w-full md:w-1/2 p-4">
              <img
                src="./img/bar1.jpg"
                alt="Beautiful spaces fit for royalty"
                class="w-full h-auto object-cover rounded shadow-lg mb-4"
              />
              <h3 class="text-xl font-bold mb-2">Bar</h3>
              <p class="text-sm text-gray-600">
                Zanurz się w atmosferze luksusu i smaku
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="h-auto flex justify-center">
      <svg
        height="210"
        class="m-20"
        width="1.8"
        xmlns="http://www.w3.org/2000/svg"
      >
        <line
          x1="0"
          y1="0"
          x2="0"
          y2="200"
          style="stroke: black; stroke-width: 14"
        />
      </svg>
    </div>
    
    

    <div class="bg-gray-100 p-4 shadow rounded-lg flex flex-col lg:flex-row items-center my-10 justify-center max-w-[905px]  mx-auto">
      <div class="flex flex-col lg:flex-row items-center w-full lg:w-auto">
        <!-- Pokoje -->
        <select class="border border-gray-300 rounded p-2 text-gray-700 mb-2 lg:mb-0 lg:mr-4">
          <option value="standard">Standard</option>
          <option value="deluxe">Deluxe</option>
          <option value="suite">Suite</option>
        </select>
        <!-- Daty -->
        <div class="flex flex-col lg:flex-row items-center mb-2 lg:mb-0 lg:mr-2">
          <input type="date" class="border border-gray-300 rounded p-2 text-gray-700 mb-2 lg:mb-0 lg:mr-2">
          <span class="text-gray-700 mx-2">-</span>
          <input type="date" class="border border-gray-300 rounded p-2 text-gray-700">
        </div>
        <!-- Dorośli -->
        <input type="number" min="1" value="" class="border border-gray-300 rounded p-2 w-full lg:w-32 text-gray-700 mb-2 lg:mb-0 lg:mr-4" placeholder="Dorośli">
        <!-- Dzieci -->
        <input type="number" min="0" value="" class="border border-gray-300 rounded p-2 w-full lg:w-32 text-gray-700" placeholder="Dzieci">
      </div>
    
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mt-2 lg:mt-0 ml-0 lg:ml-4 px-4 rounded">
        Zarezerwuj
      </button>
    </div>

      
  </div>

  

  <div class="max-w-screen-2xl mb-24 mx-auto px-4">
    <h2 class="text-3xl font-bold text-center m-8">Wydarzenia</h2>
    <div class="grid md:grid-cols-4 gap-6">
      <div class="shadow-lg overflow-hidden">
        <img
          src="./img/jazzkolacja.webp"
          alt="Przystępny Luksus"
          class="w-full h-64 object-cover"
        />
        <div class="p-4">
          <h3 class="font-bold text-lg mb-2">Ekskluzywny wieczór przy muzyce</h3>
          <p class="text-sm text-gray-600">
            Czeka na Państwa wyjątkowy wieczór w towarzystwie znakomitej muzyki na żywo
          </p>
        </div>
      </div>
      <div class="shadow-lg overflow-hidden">
        <img
          src="./img/degustacja.webp"
          alt="Doświadcz Panoramy"
          class="w-full h-64 object-cover"
        />
        <div class="p-4">
          <h3 class="font-bold text-lg mb-2">Degustacja Luksusowych Win</h3>
          <p class="text-sm text-gray-600">
            Eksluzywna degustacja win i potraw prowadzona przez naszego doświadczonego sommeliera.<br> Podczas tego wydarzenia będziesz mógł cieszyć się wykwintnymi winami oraz kulinarnymi kompozycjami przygotowanymi specjalnie dla naszych gości.
          </p>
        </div>
      </div>
      <div class="shadow-lg overflow-hidden">
        <img
          src="./img/offer3.jpg"
          alt="Kobieta w spa"
          class="w-full h-64 object-cover"
        />
        <div class="p-4">
          <h3 class="font-bold text-lg mb-2">Sesja Relaksacyjna i Spa dla VIP-ów</h3>
          <p class="text-sm text-gray-600">
            Potrzebujesz odrobiny relaksu? Skorzystaj z naszych usług spa i odnowy biologicznej, które zapewnią Ci niezapomniany relaks i odprężenie. Nasz zespół doświadczonych terapeutów zadba o Twój komfort i poczucie luksusu podczas każdego zabiegu.
          </p>
        </div>
      </div>
      <div class="shadow-lg overflow-hidden">
        <img
          src="./img/offer4.jpg"
          alt="Oferty w restauracji"
          class="w-full h-64 object-cover"
        />
        <div class="p-4">
          <h3 class="font-bold text-lg mb-2">Gala charytatywna</h3>
          <p class="text-sm text-gray-600">
            Dołącz do naszej luksusowej gali charytatywnej, podczas której będziesz mógł wesprzeć potrzebujących, biorąc udział w aukcji przedmiotów ekskluzywnych, koncertach oraz wykwintnych kolacjach.
          </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- MAPA -->
    <div class="w-full h-auto flex justify-center bg-beige2">
      <div class="max-w-screen-2xl mx-4 py-12 lg:flex lg:justify-center lg:items-center">
        <h2 class="text-5xl font-medium text-center lg:hidden mb-8">Lokalizacja</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.828450810997!2d20.99588947704881!3d52.22833445778222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecd9cb86997ef%3A0xf64528434564edb5!2sNYX%20Hotel%20Warsaw!5e0!3m2!1spl!2spl!4v1715506010126!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="max-w-full mx-auto rounded-lg overflow-hidden mt-8 lg:mt-0">
          <div class="px-6 py-4">
            <h3 class="text-2xl font-bold text-gray-900">Nasz adres</h3>
            <p class="mt-1 text-gray-600">Chmielna 71, 00-801 Warszawa</p>
          </div>
          <div class="border-t border-gray-200 px-6 py-4">
            <h3 class="text-2xl font-bold text-gray-900">Godziny</h3>
            <p class="mt-1 text-gray-600">Poniedziałek - Piątek: 6:00 - 23:00</p>
            <p class="mt-1 text-gray-600">Weekend: 24/7</p>
          </div>
          <div class="border-t border-gray-200 px-6 py-4">
            <h3 class="text-2xl font-bold text-gray-900">Kontakt</h3>
            <a href="mailto:Titaniumtower@info.com"><p class="mt-1 text-gray-600">Email: Titaniumtower@info.com</p></a>
            <p class="mt-1 text-gray-600">Telefon: +48 111 111 111</p>
          </div><div class="border-t border-gray-200 px-6 py-4">
            <h3 class="text-2xl font-bold text-gray-900">Parking 24/7</h3>
            <a href="tel:+48222222222"><p class="mt-1 text-gray-600">Telefon : (+48) 222 222 222</p></a>
          </div>
          
        </div>
        
      </div>
      
    </div>
    <div class="h-auto flex justify-center">
      
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
