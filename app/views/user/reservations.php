
<?php
  require_once dirname(__DIR__) . '../../config/config.php';
  require_once dirname(__DIR__) . '../../config/db.php';
 
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: index.php?action=panel');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TitaniumTower - Profil</title>
  <script src="../js/scripts.js"></script>
  <link rel="stylesheet" href="<?= BASE_URL ?>/app/views/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />


  
</head>

<body class="font-sans  overflow-auto scrollbar-hide">
<?php 
    require_once BASE_PATH . '/views/user/header.php';
  ?>
  
  <?php 
    require_once BASE_PATH . '/views/user/usernav.php';
  


    
  ?>




<div class="container mx-auto h-screen max-w-4xl   pb-8">
        <h1 class="text-3xl font-bold text-center mb-6">Twoje Rezerwacje</h1>
        <div class="grid grid-cols-1 gap-4 justify-center">
            <?php foreach ($reservations as $reservation): ?>
                <div class=" bg-white rounded-xl h-auto border-blue1 border-2 grid mx-4 grid-cols-1 md:grid-cols-2 shadow-lg">
                    <div class="flex justify-center flex-col">
                    <img src="<?= BASE_URL ?>/public/img/<?= htmlspecialchars($reservation['roomType']) ?>.jpg" alt="<?= htmlspecialchars($reservation['roomType']) ?>" class="  object-cover rounded-lg m-4">
                   
                    </div>
                    <div class="md:p-6 pt-2 p-6">
                    <div class="flex justify-center col-span-2">
                        
                            <p class="font-semibold text-3xl"><?= htmlspecialchars($reservation['roomType']) ?></p>
                            
                     
                                </div>
                        <div class="grid grid-cols-2  gap-4 text-center mt-4">
                            <div>
                                <label class="block text-sm">Data zameldowania</label>
                                <p class="text-xl"><?= htmlspecialchars($reservation['StartReservation']) ?></p>
                            </div>
                            <div>
                                <label class="block text-sm">Data wymeldowania</label>
                                <p class="text-xl"><?= htmlspecialchars($reservation['EndReservation']) ?></p>
                            </div>
                            <div>
                                <label class="block text-sm">Dorośli</label>
                                <p class="text-xl"><?= htmlspecialchars($reservation['Adults']) ?></p>
                            </div>
                            <div>
                                <label class="block text-sm">Dzieci</label>
                                <p class="text-xl"><?= htmlspecialchars($reservation['Childs']) ?></p>
                            </div>
                            <div>
                                <label class="block text-sm">Śniadanie</label>
                                <p class="text-xl"><?= $reservation['Breakfast'] ? 'Tak' : 'Nie' ?></p>
                            </div>
                            <div>
                                <label class="block text-sm">Parking</label>
                                <p class="text-xl"><?= $reservation['Parking'] ? 'Tak' : 'Nie' ?></p>
                            </div>
                        </div>
                        
                       
                    </div>
                   
                        <p class="text-center  border-blue1 border-2 flex justify-center items-center text-xl mb-4 mx-4 py-1 rounded-lg">
                                <?php
                                    $currentDate = date('Y-m-d');
                                    if ($currentDate < $reservation['StartReservation']) {
                                        echo 'Nadchodząca';
                                    } elseif ($currentDate > $reservation['EndReservation']) {
                                        echo 'Zrealizowana';
                                    } else {
                                        echo 'Trwająca';
                                    }
                                ?>
                        </p>
                                <p class="text-3xl  text-center  mb-4"><?= htmlspecialchars($reservation['Price']) ?> zł</p>

                        
                               
                              
                        
                </div>
                
            <?php endforeach; ?>
        </div>
    </div>


  <?php require_once BASE_PATH . '/views/footer.php'; ?>
  
</body>
</html>