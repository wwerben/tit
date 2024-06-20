
<?php
require_once dirname(__DIR__) . '../config/config.php';
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controllers/controller.php';



$userIsActive = isset($_SESSION['user']) && $_SESSION['user'] !== null;

$button1Class = $userIsActive ? 'hidden' : '';
$button2Class = $userIsActive ? '' : 'hidden';


?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/app/views/css/style.css" />
    <title>Titanium Tower</title>
    
  </head>
  <body class="font-sans overflow-auto ">
  <script src="<?= BASE_URL ?>/app/views/js/scripts.js"></script>


<header id="mainHeader" class="fixed top-0 left-0 w-full z-30 bg-blue1 h-28 transition-all duration-500 ease-in-out">
      <div class="w-full h-full flex justify-between items-center relative px-4 lg:px-8">
          
          <div class="flex items-center">
            <a href="index.php?action=showHome" class="cursor-pointer">
              <img
                src="<?= BASE_URL ?>/public/img/logo.png"
                class="logo h-24 ml-4 transition-all duration-500 ease-in-out"
                alt="logo"
              />
            </a>
          </div>

          
          <div class="lg:hidden absolute right-4 top-1/2 transform -translate-y-1/2">
              <img src="<?= BASE_URL ?>/public/img/burgermenu.svg" class="h-12 w-12 burger cursor-pointer" alt="Menu" onclick="toggleMenu()">
          </div>

          
          <nav class="hidden lg:flex text-white text-xl mr-4 font-medium space-x-8 xl:space-x-12">
              <a href="<?= BASE_URL ?>/app/views/apartamenty.php" class="nav-link py-2  underline-animation">Apartamenty</a>
              <a href="<?= BASE_URL ?>/app/views/galeria.php" class="nav-link py-2  underline-animation">Galeria</a>
              <a href="<?= BASE_URL ?>/app/views/reservations/ResForm.php" class="nav-link py-2 underline-animation">Rezerwacje</a>
              <a href="<?= BASE_URL ?>/app/views/kontakt.php" class="nav-link py-2 underline-animation">Kontakt</a>
              <a href="<?= BASE_URL ?>/app/views/login.php"  name="toggle" class="nav-link py-2 px-6 border-2 hover:bg-blue2 <?php echo $button1Class; ?>">Logowanie</a>
              <a href="index.php?action=panel"  name="toggle" class=" nav-link py-2 px-6 border-2 hover:bg-blue2 <?php echo $button2Class; ?>">Panel Klienta</a>

          </nav>
      </div>

     
    

      <div id="menu" class="hidden left-0 w-full h-screen bg-blue1 bg-opacity-80 mt-0 text-white p-5 z-50 flex-col justify-center">
        <ul class="space-y-4 text-3xl font-medium">
            <li><a href="<?= BASE_URL ?>/app/views/galeria.php" class="block text-center p-2 m-16">Apartamenty</a></li>
            <li><a href="<?= BASE_URL ?>/app/views/galeria.php" class="block text-center p-2 m-16">Galeria</a></li>
            <li><a href="<?= BASE_URL ?>/app/views/rezerwacje.php" class="block text-center p-2 m-16">Rezerwacje</a></li>
            <li><a href="<?= BASE_URL ?>/app/views/kontakt.php" name="toggle" class="block text-center p-2 m-16">Kontakt</a></li>
            <li><a href="<?= BASE_URL ?>/app/views/login.php" name="toggle" class=" block text-center p-2 m-16 border-3 <?php echo $button1Class; ?>">Logowanie</a></li>
            <li><a href="index.php?action=panel" name="toggle" class="block text-center p-2 m-16 border-3 <?php echo $button2Class; ?>">Panel Klienta</a></li>
        </ul>
      </div>
    
    </header>
 
    
    <div class="w-full">
      <div class="w-full">
        <div class="bg-black w-full h-screen opacity-30 absolute"></div>
        <img src="<?= BASE_URL ?>/public/img/main.webp" alt="Zdjęcie hotelu" class="w-full h-screen relative object-cover"/>
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
          
          <div class="shadow-lg overflow-hidden">
            <img
              src="<?= BASE_URL ?>/public/img/offer1.jpg"
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
        
          <div class="shadow-lg overflow-hidden">
            <img
              src="<?= BASE_URL ?>/public/img/offer2.jpg"
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
         
          <div class="shadow-lg overflow-hidden">
            <img
              src="<?= BASE_URL ?>/public/img/offer3.jpg"
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
       
          <div class="shadow-lg overflow-hidden">
            <img
              src="<?= BASE_URL ?>/public/img/offer4.jpg"
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
                src="<?= BASE_URL ?>/public/img/roomclassic.jpg"
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
                src="<?= BASE_URL ?>/public/img/room2.jpg"
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
                src="<?= BASE_URL ?>/public/img/restaurant.jpg"
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
                src="<?= BASE_URL ?>/public/img/bar1.jpg"
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
    
    

    
      
  </div>

  

  <div class="max-w-screen-2xl mb-24 mx-auto px-4">
    <h2 class="text-3xl font-bold text-center m-8">Wydarzenia</h2>
    <div class="grid md:grid-cols-4 gap-6">
      <div class="shadow-lg overflow-hidden">
        <img
          src="<?= BASE_URL ?>/public/img/jazzkolacja.webp"
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
          src="<?= BASE_URL ?>/public/img/degustacja.webp"
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
          src="<?= BASE_URL ?>/public/img/offer3.jpg"
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
          src="<?= BASE_URL ?>/public/img/offer4.jpg"
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
    <?php require_once BASE_PATH . '/views/footer.php'; ?>
    
  </body>
</html>
