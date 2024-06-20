<?php


require_once dirname(__DIR__) . '../../config/config.php';
require_once dirname(__DIR__) . '../../config/db.php';
require_once BASE_PATH . '/controllers/controller.php';
$email = $_SESSION['user'];

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
  <link rel="stylesheet" href="../../../app/views/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>

<body class="font-sans overflow-auto scrollbar-hide">
<?php 
    require_once './header.php';
?>

<div class="flex justify-center">
  <div class="m-4 md:m-16 max-w-3xl mb-24 h-auto">
    <div>
      <?php require_once './usernav.php'; ?>
    </div>
    <div class="md:p-6 p-8 mt-8 border-2 rounded-xl">
      <div class="flex justify-between">
        <h1 class="text-3xl mb-8 font-bold">Witaj, <?= htmlspecialchars($userData['firstName']) ?></h1>
        <div class="mt-2">
          <a href="index.php?action=showEditProfileForm" class="bg-blue1 rounded-xl text-white px-4 py-3 border-2 md:text-sm border-white hover:bg-blue2">Edytuj</a>
        </div>
      </div>
      <h2 class="font-bold text-xl mb-2 md:text-center text-left">Podstawowe informacje</h2>
      <div class="grid grid-cols-2">
        <?php if ($userData): ?>
        <div>
          <label class="font-semibold text-lg">Imię</label>
          <p class="text-xl"><?= htmlspecialchars($userData['firstName']) ?></p>
        </div>
        <div>
          <label class="font-semibold text-lg">Nazwisko</label>
          <p class="text-xl"><?= htmlspecialchars($userData['lastName']) ?></p>
        </div>
      </div>
      <h2 class="font-bold text-xl mb-2 mt-8">Dane Kontaktowe</h2>
      <div class="grid grid-cols-2 text-left md:text-center">
        <div>
          <label class="font-semibold text-lg">Numer Telefonu</label>
          <p class="text-xl"><?= htmlspecialchars($userData['phoneNumber']) ?></p>
        </div>
        <div>
          <label class="font-semibold text-lg">Email</label>
          <p class="text-xl"><?= htmlspecialchars($userData['email']) ?></p>
        </div>
        <?php else: ?>
          <p>Nie znaleziono danych użytkownika.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php require_once BASE_PATH . '/views/footer.php'; ?>
<div class="h-screen bg-blue1"></div>
</body>
</html>
