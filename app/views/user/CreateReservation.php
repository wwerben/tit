
<?php
require_once dirname(__DIR__) . '../../config/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
  header('Location: index.php?action=panel');
  exit();
}

require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/controllers/controller.php';
require_once BASE_PATH . '/controllers/ReservationController.php';

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TitaniumTower - Profil</title>
  <script src="<?= BASE_URL ?>/app/views/js/scripts.js"></script>
  <link rel="stylesheet" href="../../../app/views/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

  
  <script>
   document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById("StartReservation");
        const endDateInput = document.getElementById("EndReservation");
        const adultsInput = document.getElementById("Adults");
        const form = document.querySelector("form");
        const today = new Date().toISOString().split('T')[0];
        const nextYear = new Date();
        nextYear.setFullYear(nextYear.getFullYear() + 1);
        const nextYearStr = nextYear.toISOString().split('T')[0];

        // Ustaw minimalną datę na dzisiejszą datę
        startDateInput.setAttribute('min', today);
        startDateInput.setAttribute('max', nextYearStr);
        endDateInput.setAttribute('min', today);
        endDateInput.setAttribute('max', nextYearStr);

        startDateInput.addEventListener('change', function() {
            const startDate = new Date(this.value);
            const maxEndDate = new Date(startDate);
            maxEndDate.setDate(maxEndDate.getDate() + 30);

            // Ustaw minimalną datę zakończenia na wybraną datę rozpoczęcia
            endDateInput.setAttribute('min', this.value);

            // Ustaw maksymalną datę zakończenia na 30 dni od daty rozpoczęcia lub maksymalną datę na rok do przodu
            endDateInput.setAttribute('max', Math.min(maxEndDate, nextYear).toISOString().split('T')[0]);
        });

        form.addEventListener('submit', function(event) {
            // Sprawdzenie, czy jest co najmniej 1 osoba dorosła
            if (parseInt(adultsInput.value) < 1) {
                showAlert('There must be at least 1 adult.');
                event.preventDefault();
            }
        });
      });

   



  </script>

        
</head>

<body class="font-sans overflow-auto scrollbar-hide">
<?php 
   
    require_once BASE_PATH . '/views/user/header.php';
  ?>
      

      
      <?php 
          require_once BASE_PATH . '/views/user/usernav.php';
         ?>

        <div class="  m-4 md:m-4">
        <form action="index.php?action=createReservation" method="POST" class="max-w-lg mx-auto border-2 border-blue1 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-center mb-6">Tworzenie Rezerwacji</h2>
        
        <div class="mb-4">
          <label for="roomType" class="block  text-gray-700">Rodzaj Pokoju</label>
          <select id="roomType" name="roomType" required class="w-full p-2 border border-gray-300 rounded   mt-1" >
              <option value="Standard">Standard</option>
              <option value="Deluxe">Deluxe</option>
              <option value="Suite">Suite</option>
          </select>
            
        </div>

      

        <div class="mb-4">
            <label for="StartReservation" class="block text-gray-700">Data zameldowania</label>
            <input type="date" id="StartReservation" name="StartReservation" required class="w-full p-2  border border-gray-300 rounded mt-1">
        </div>

        <div class="mb-4">
            <label for="EndReservation" class="block text-gray-700">Data wymeldowania</label>
            <input type="date" id="EndReservation" name="EndReservation" required class="w-full p-2 border  border-gray-300 rounded mt-1">
        </div>

      

        <div class="mb-4 ">
            <div class="grid grid-cols-2 grid-rows-1 gap-2 place-items-center">
            
            
            <div class="mr-4 flex flex-col justify-center w-full">
              <label for="Adults" class="block text-gray-700 text-center">Dorośli      </label>
              <input type="number" id="Adults" name="Adults" required class=" p-2 mx-4 text-center border border-gray-300 rounded mt-1" min="1" max="6" value="1">
            </div>
            <div class="ml-6 mr-4 flex flex-col justify-center w-full">
            <label for="Childs" class="block text-gray-700 text-center">  Dzieci (do 12 lat) </label>
            <input type="number" id="Childs" name="Childs" class=" p-2 mx-4 text-center border border-gray-300 rounded mt-1" min="0" max="4" value="0">
          </div>
          </div>
        </div>

        <div class="mb-4 grid grid-cols-2 grid-rows-1 ">
           
            <div class="flex flex-col text-center  rounded-lg px-2 py-1">
              <label for="Breakfast" class="block my-2 text-gray-700">Śniadanie (60zł/os)</label>
              <input type="checkbox" id="Breakfast" name="Breakfast" value="0" class="mt-1">
            </div>
            <div class="flex flex-col text-center  rounded-lg px-2 py-1">
              <label for="Parking" class="block my-2 text-gray-700">Parking (60zł doba)</label>
              <input type="checkbox" id="Parking" name="Parking" value="0" class="mt-1">
            </div>
            
        </div>

      
      

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded mt-4 hover:bg-blue-600">Zarezerwuj</button>
    </form>
    <div id="alertContainer"></div>
        </div>
      
      
</div>
  <div class="h-64">
  
</div>
<div class="h-64">
  
  </div>
</div>
</div>
  <?php require_once BASE_PATH . '/views/footer.php'; ?>
</body>
</html>