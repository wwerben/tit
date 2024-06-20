<?php

require_once '../../../app/config/config.php';
require_once BASE_PATH . '/config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php?action=panel');
    exit();
  }
// Połączenie z bazą danych
$db = dbConnect();

// Pobieranie ID klienta z parametrów URL
$customerID = $_GET['id'] ?? null;
if ($customerID) {
    // Pobieranie danych klienta
    $stmt = $db->prepare('SELECT * FROM user WHERE ID = ?');
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $customerResult = $stmt->get_result();
    $customer = $customerResult->fetch_assoc();
    
    // Pobieranie danych rezerwacji klienta
    $stmt = $db->prepare('SELECT * FROM reservations WHERE CustomerID = ?');
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $result = $stmt->get_result();
    $reservations = [];
    if ($result->num_rows > 0) {
        $reservations = $result->fetch_all(MYSQLI_ASSOC);
    }
} else {
    header('Location: klienci.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rezerwacje Klienta</title>
  <script src="../scripts.js"></script>
  <link rel="stylesheet" href="../../../app/views/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>

<body class="font-sans scrollbar-hide">
<?php 
    require_once './header.php';
  ?>

  <div class="flex w-full">
    <?php require_once 'adminnav.php'?>
    <div class="p-4 mt-4 w-full">
      <h1 class="text-2xl font-bold mb-4 w-full">Rezerwacje Klienta: <?= htmlspecialchars($customer['firstName']) ?> <?= htmlspecialchars($customer['lastName']) ?></h1>

      <div class="overflow-x-auto w-full">
        <table class="border-collapse border border-slate-600 bg-white w-full table-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border border-slate-600">ID</th>
                    <th class="py-2 px-4 border border-slate-600">Typ Pokoju</th>
                    <th class="py-2 px-4 border border-slate-600">Numer Pokoju</th>
                    <th class="py-2 px-4 border border-slate-600">Data Rezerwacji</th>
                    <th class="py-2 px-4 border border-slate-600">Początek Rezerwacji</th>
                    <th class="py-2 px-4 border border-slate-600">Koniec Rezerwacji</th>
                    <th class="py-2 px-4 border border-slate-600">Dorośli</th>
                    <th class="py-2 px-4 border border-slate-600">Dzieci</th>
                    <th class="py-2 px-4 border border-slate-600">Śniadanie</th>
                    <th class="py-2 px-4 border border-slate-600">Parking</th>
                    <th class="py-2 px-4 border border-slate-600">Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reservations) && count($reservations) > 0): ?>
                    <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['ID']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['roomType']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['roomNumber']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['DateOfPlacedReservation']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['StartReservation']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['EndReservation']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['Adults']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['Childs']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['Breakfast']) ? 'Tak' : 'Nie' ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['Parking']) ? 'Tak' : 'Nie' ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($reservation['Price']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="py-2 px-4 border-b" colspan="11">Brak rezerwacji.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <?php require_once BASE_PATH . '/views/footer.php'; ?>
</body>
</html>
