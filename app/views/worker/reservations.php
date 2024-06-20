<?php
require_once '../../../app/config/config.php';
require_once BASE_PATH . '/config/db.php';



if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header('Location: index.php?action=panel');
    exit();
}

$db = dbConnect();

// Handling deletion
if (isset($_GET['delete_id'])) {
    $deleteID = intval($_GET['delete_id']);
    $stmt = $db->prepare('DELETE FROM reservations WHERE ID = ?');
    $stmt->bind_param('i', $deleteID);
    $stmt->execute();
    header('Location: reservations.php');
    exit();
}

// Pobieranie danych rezerwacji
$queryParam = $_GET['query'] ?? '';
if ($queryParam) {
    $stmt = $db->prepare('SELECT * FROM reservations WHERE roomType LIKE ? OR roomNumber LIKE ?');
    $searchQuery = '%' . $queryParam . '%';
    $stmt->bind_param('ss', $searchQuery, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = 'SELECT * FROM reservations';
    $result = $db->query($query);
}

$reservations = [];
if ($result->num_rows > 0) {
    $reservations = $result->fetch_all(MYSQLI_ASSOC);
}

$customerIDs = array_column($reservations, 'CustomerID');
$customerIDs = implode(',', $customerIDs);
$customersQuery = "SELECT * FROM user WHERE ID IN ($customerIDs)";
$customersResult = $db->query($customersQuery);
$customers = [];
if ($customersResult->num_rows > 0) {
    while ($row = $customersResult->fetch_assoc()) {
        $customers[$row['ID']] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simple Tailwind Starter</title>
  <script src="../scripts.js"></script>
  <link rel="stylesheet" href="../../../app/views/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>

<body class="font-sans scrollbar-hide">
<?php 
    require_once './header.php';
?>

<div class="flex  w-full">
    <?php require_once 'adminnav.php' ?>
    <div class="p-4 mt-4  w-full">
      <div class="flex justify-between w-full">
        <h1 class="text-2xl font-bold mb-4  w-full">Lista Rezerwacji</h1>
        
        <form action="reservations.php" method="get" class="mb-4 flex h-12 w-full">
            <input type="text" name="query" placeholder="Szukaj rezerwacji" value="<?= htmlspecialchars($queryParam) ?>" class="border p-2 w-full">
            <button type="submit" class="bg-blue2 text-white px-6">Szukaj</button>
        </form>
      </div>

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
                    <th class="py-2 px-4 border border-slate-600">Szczegóły</th>
                    <th class="py-2 px-4 border border-slate-600">Usuń</th>
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
                        <td class="py-2 px-4 border border-slate-600 text-center">
                            <a href="index.php?action=showReservationDetails&id=<?= $reservation['ID'] ?>" class="bg-blue1 m-2 text-white py-2 px-3 rounded-md font-medium">Szczegóły</a>
                        </td>
                        <td class="py-2 px-4 border border-slate-600 text-center">
                            <a href="reservations.php?delete_id=<?= htmlspecialchars($reservation['ID']) ?>" class="bg-red-600 m-2 text-white font-medium rounded-md py-2 px-3" onclick="return confirm('Czy na pewno chcesz usunąć tę rezerwację?')">Usuń</a>
                        </td>
                    </tr>
                    <tr id="details-<?= $reservation['ID'] ?>" style="display: none;">
                        <td colspan="13" class="border border-slate-600">
                            <?php 
                            $customer = $customers[$reservation['CustomerID']] ?? null;
                            if ($customer):
                            ?>
                            <div class="p-4">
                                <p><strong>Imię:</strong> <?= htmlspecialchars($customer['firstName']) ?></p>
                                <p><strong>Nazwisko:</strong> <?= htmlspecialchars($customer['lastName']) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
                                <p><strong>Telefon:</strong> <?= htmlspecialchars($customer['phoneNumber']) ?></p>
                            </div>
                            <?php else: ?>
                            <div class="p-4">
                                <p>Brak danych klienta.</p>
                            </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="py-2 px-4 border-b" colspan="13">Brak rezerwacji.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<?php require_once BASE_PATH . '/views/footer.php'; ?>

         
</body>
<script>
function toggleDetails(id) {
    var detailsRow = document.getElementById('details-' + id);
    if (detailsRow.style.display === 'none') {
        detailsRow.style.display = '';
    } else {
        detailsRow.style.display = 'none';
    }
}
</script>
</html>
