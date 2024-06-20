<?php
  require_once dirname(__DIR__) . '../../config/config.php';
  require_once BASE_PATH . '/models/model.php';

  if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header('Location: index.php?action=panel');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/app/views/css/style.css" />
    <title>Document</title>
</head>

<body class="font-sans overflow-auto scrollbar-hide">
<?php 
    require_once 'header.php';
  ?>

<div class="flex w-full">
    <?php require_once 'adminnav.php'?>


<div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Panel Głowny</h1>
        
        <h2 class="text-2xl font-semibold mb-4">Aktualne rezerwacje</h2>
        <div class="grid grid-cols-4 gap-5  overflow-auto h-2/5   ">
            <?php foreach ($reservations as $reservation): ?>
                <?php if ( $reservation['actual'] == 1): ?>
                <div class="bg-white p-4 rounded-lg h-auto shadow-md ">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-lg"><?= htmlspecialchars($reservation['roomType']) ?></span>
                        <span class="text-md font-semibold "><?= htmlspecialchars($reservation['roomNumber']) ?></span>
                    </div>
                   

                    <div class="grid gap-3 grid-cols-2">
                        <div class="text-center">
                            <label class="font-semibold">Zameldowanie<label>
                            <p class="text-sm font-normal"> <?= htmlspecialchars($reservation['StartReservation']) ?></p>
                        </div>
                        <div class="text-center">
                            <label class="font-semibold">Wymeldowanie<label>
                            <p class="text-sm font-normal"> <?= htmlspecialchars($reservation['EndReservation']) ?></p>
                        </div>
                        <div class="text-center">
                            <label class="font-semibold">Nazwisko<label>
                            <p class="text-sm font-normal"> <?= htmlspecialchars($reservation['lastName']) ?></p>
                        </div>
                        <div class="text-center">
                            <label class="font-semibold">Numer Telefonu<label>
                            <p class="text-sm font-normal"> <?= htmlspecialchars($reservation['phoneNumber']) ?></p>
                        </div>
                      
                       
                    
                    </div>
                   <div class="flex justify-center mt-4">
                          <a href="index.php?action=showReservationDetails&id=<?= htmlspecialchars($reservation['ID']) ?>" class="bg-blue1 my-2 text-white py-2 px-3 rounded-md font-medium">Szczegóły</a>
                 
                   </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="grid grid-cols-2 gap-4 mt-16">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Tabela dzisiejszych zameldowań</h2>
                <!-- Kod do wyświetlenia dzisiejszych zameldowań -->
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Typ Pokoju</th>
                            <th scope="col" class="px-6 py-3">Numer Pokoju</th>
                            <th scope="col" class="px-6 py-3">Data Zameldowania</th>
                            <th scope="col" class="px-6 py-3">Data Wymeldowania</th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <?php
                            $currentDate = date('Y-m-d');
                            if ($reservation['StartReservation'] === $currentDate && $reservation['actual'] == 0): ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['roomType']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['roomNumber']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['StartReservation']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['EndReservation']) ?></td>
                                    <td class="px-6 py-4"> <a href="index.php?action=showReservationDetails&id=<?= htmlspecialchars($reservation['ID']) ?>" class="text-white py-2 px-3 rounded-md bg-blue1 text-center ">Szczegóły</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Tabela dzisiejszych wymeldowań</h2>
                <!-- Kod do wyświetlenia dzisiejszych wymeldowań -->
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Typ Pokoju</th>
                            <th scope="col" class="px-6 py-3">Numer Pokoju</th>
                            <th scope="col" class="px-6 py-3">Data Zameldowania</th>
                            <th scope="col" class="px-6 py-3">Data Wymeldowania</th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <?php
                            $currentDate = date('Y-m-d');
                            if ($reservation['EndReservation'] === $currentDate && $reservation['actual'] == 1): ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['roomType']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['roomNumber']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['StartReservation']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($reservation['EndReservation']) ?></td>
                                    <td class="px-6 py-4"> <a href="index.php?action=showReservationDetails&id=<?= htmlspecialchars($reservation['ID']) ?>" class="text-white py-2 px-3 rounded-md bg-blue1 text-center ">Szczegóły</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php require_once BASE_PATH . '/views/footer.php'; ?>
</body>
</html>
