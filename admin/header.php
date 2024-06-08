<?php
require_once '../config.php';

$userIsActive = isset($_SESSION['user']) && $_SESSION['user'] !== null;

$button1Class = $userIsActive ? 'hidden' : '';
$button2Class = $userIsActive ? '' : 'hidden';
?>




<header  class="top-0 left-0 w-full z-30 bg-blue1 h-28 transition-all duration-500 ease-in-out">
      <div class="w-full h-full flex justify-between items-center relative px-4 lg:px-8">
          
          <div class="flex items-center">
            <a href="../home.php" class="cursor-pointer">
              <img
                src="../img/logo.png"
                class="logo h-24 ml-4 transition-all duration-500 ease-in-out"
                alt="logo"
              />
            </a>
          </div>

          
          <div class="lg:hidden absolute right-4 top-1/2 transform -translate-y-1/2">
              <img src="../img/burgermenu.svg" class="h-12 w-12 burger cursor-pointer"  onclick="toggleMenu()">
          </div>

          
          <nav class="hidden lg:flex text-white text-xl mr-4 font-medium space-x-8 xl:space-x-12">
              <a href="Apartamenty.php" class="nav-link py-2 underline-animation">Apartamenty</a>
              <a href="galeria.php" class="nav-link py-2  underline-animation">Galeria</a>
              <a href="rezerwacje.php" class="nav-link py-2 underline-animation">Rezerwacje</a>
              <a href="kontakt.php" class="nav-link py-2 underline-animation">Kontakt</a>
              <a href="login.php"  name="toggle" class="nav-link py-2 px-6 border-2 hover:bg-blue2 <?php echo $button1Class; ?>">Logowanie</a>
              <a href="index.php?action=panel"  name="toggle" class=" nav-link py-2 px-6 border-2 hover:bg-blue2 <?php echo $button2Class; ?>">Panel Klienta</a>

          </nav>
      </div>

     
    

      <div  class="hidden left-0 w-full h-screen bg-blue1 bg-opacity-80 mt-0 text-white p-5 z-50 flex-col justify-center">
        <ul class="space-y-4 text-3xl font-medium">
            <li><a href="apartamenty.php" class="block text-center mb-16 mt-30 p-2 ">Apartamenty</a></li>
            <li><a href="galeria.php" class="block text-center p-2 m-16">Galeria</a></li>
            <li><a href="rezerwacje.php" class="block text-center p-2 m-16">Rezerwacje</a></li>
            <li><a href="kontakt.php" name="toggle" class="block text-center p-2 m-16">Kontakt</a></li>
            <li><a href="login.php" name="toggle" class=" block text-center p-2 m-16 border-3 <?php echo $button1Class; ?>">Logowanie</a></li>
            <li><a href="index.php?action=panel" name="toggle" class="block text-center p-2 m-16 border-3 <?php echo $button2Class; ?>">Panel Klienta</a></li>
        </ul>
      </div>
    
    </header>