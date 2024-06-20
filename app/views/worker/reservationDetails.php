
    <?php
    require_once dirname(__DIR__) . '../../config/config.php';
    require_once dirname(__DIR__) . '../../config/db.php';
    
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

        <?php require_once BASE_PATH . '/views/worker/header.php'; ?>
        

        <div class="container min-h-screen mx-auto py-8">

            <h1 class="text-3xl font-bold text-center mb-6">Szczegóły Rezerwacji</h1>
        
    
            <div class=" grid grid-cols-2 gap-6">
                
                <table class="min-w-full divide-y shadow-md bg-white p-6 rounded-lg  divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pole</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wartość</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Typ Pokoju</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['roomType']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Numer Pokoju</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['roomNumber']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Data Zameldowania</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['StartReservation']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Data Wymeldowania</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['EndReservation']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Dorośli</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['Adults']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Dzieci</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['Childs']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Śniadanie</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= $reservation['Breakfast'] ? 'Tak' : 'Nie' ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Parking</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= $reservation['Parking'] ? 'Tak' : 'Nie' ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Cena</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($reservation['Price']) ?> zł</td>
                        </tr>
                        
                    </tbody>
                </table>
                <table class="min-w-full divide-y shadow-md bg-white p-6 rounded-lg divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pole</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wartość</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Imię</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['firstName']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Nazwisko</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['lastName']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Numer Telefonu</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['phoneNumber']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">E-mail</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['email']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Region</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['region']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Utworzenie Konta</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($user['createdat']) ?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Wymelduj/Zamelduj</td>
                            <td class="px-6 py-4 whitespace-nowrap"><a href="index.php?action=toggleRoomStatus&id=<?= htmlspecialchars($reservation['ID']) ?>" class="text-white py-2 px-4 rounded-md bg-blue1 text-center ">Zamelduj/Wymelduj</a></td>
                        </tr>
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once BASE_PATH . '/views/footer.php'; ?>
    </body>
    </html>
