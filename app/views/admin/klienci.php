<?php


require_once '../../../app/config/config.php';
require_once BASE_PATH . '/config/db.php';


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header('Location: index.php?action=panel');
  exit();
}
$db = dbConnect();

// Pobieranie danych użytkowników
$queryParam = $_GET['query'] ?? '';
if ($queryParam) {
    $stmt = $db->prepare('SELECT * FROM user WHERE (firstName LIKE ? OR lastName LIKE ? OR email LIKE ?) AND role = "user"');
    $searchQuery = '%' . $queryParam . '%';
    $stmt->bind_param('sss', $searchQuery, $searchQuery, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = 'SELECT * FROM user WHERE role = "user"';
    $result = $db->query($query);
}

$users = [];
if ($result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
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

  <div class="flex w-full">
    <?php require_once 'adminnav.php'?>
    <div class="p-4 mt-4 w-full">
      <div class="flex justify-between w-full">
        <h1 class="text-2xl font-bold mb-4 w-full">Lista Kont Klientów</h1>
        
        <form action="klienci.php" method="get" class="mb-4 flex h-12 w-full">
            <input type="text" name="query" placeholder="Szukaj klientów" value="<?= htmlspecialchars($queryParam) ?>" class="border p-2 w-full">
            <button type="submit" class="bg-blue2 text-white px-6">Szukaj</button>
        </form>
      </div>

      <div class="overflow-x-auto w-full">
        <table class="border-collapse border  border-slate-600 bg-white w-full table-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border border-slate-600">ID</th>
                    <th class="py-2 px-4 border border-slate-600">E-mail</th>
                    <th class="py-2 px-4 border border-slate-600">Imię</th>
                    <th class="py-2 px-4 border border-slate-600">Nazwisko</th>
                    <th class="py-2 px-4 border border-slate-600">Numer Telefonu</th>
                    <th class="py-2 px-4 border border-slate-600">Region</th>
                    <th class="py-2 px-4 border border-slate-600">Zwery</th>
                    <th class="py-2 px-12 border border-slate-600">Rejestracja</th>
                    <th class="py-2 px-12 border border-slate-600">Edytowany</th>
                    <th class="py-2 px-4 border border-slate-600 text-center">Edytuj</th>
                    <th class="py-2 px-4 border border-slate-600 text-center">Usuń</th>
                    <th class="py-2 px-4 border border-slate-600 text-center">Rezerwacje</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['ID']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['firstName']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['lastName']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['phoneNumber']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['region']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['verified'] ? 'Tak' : 'Nie') ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['createdat']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['updatedat']) ?></td>
                        <td class="py-3 px-5 border border-slate-600 text-center">
                          <a href="../index.php?action=editU&id=<?= htmlspecialchars($user['ID']) ?>" class="bg-blue-600 text-white py-2 px-3 rounded-md font-medium">Edytuj</a>
                        </td>
                        <td class="py-2 px-5 border border-slate-600 text-center">
                          <a href="../index.php?action=deleteUser&id=<?= htmlspecialchars($user['ID']) ?>" class="bg-red-600 text-white font-medium rounded-md py-2 px-3" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</a>
                        </td>
                        <td class="py-2 px-5 border border-slate-600 text-center">
                          <a href="rezerwacje_klienta.php?id=<?= htmlspecialchars($user['ID']) ?>" class="bg-blue1 text-white font-medium rounded-md py-2 px-3">Rezerwacje</a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="py-2 px-4 border-b" colspan="13">Brak użytkowników.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  
  <?php require_once BASE_PATH . '/views/footer.php'; ?>
</body>
</html>
