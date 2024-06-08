<?php
require_once dirname(__DIR__) . '../config.php';

checkUserAccess('admin');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simple Tailwind Starter</title>
  <script src="../scripts.js"></script>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>

<body class="font-sans overflow-auto scrollbar-hide">
<?php 
    require_once './header.php';
  ?>


  <div class="flex h-screen">
  <?php require_once 'adminnav.php'?>
  
  
  <div class="container p-4 w-full mt-28">
     
        <h1 class="text-2xl font-bold mb-4">Edytuj Użytkownika</h1>
        <form action="index.php?action=editUser&id=<?= htmlspecialchars($user['ID']) ?>" method="post" class="space-y-4">
            <div>
                <label for="email" class="block">E-mail</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full p-2 border border-gray-300" required>
            </div>
            <div>
                <label for="firstName" class="block">Imię</label>
                <input type="text" name="firstName" id="firstName" value="<?= htmlspecialchars($user['firstName']) ?>" class="w-full p-2 border border-gray-300" required>
            </div>
            <div>
                <label for="lastName" class="block">Nazwisko</label>
                <input type="text" name="lastName" id="lastName" value="<?= htmlspecialchars($user['lastName']) ?>" class="w-full p-2 border border-gray-300" required>
            </div>
            <div>
                <label for="phoneNumber" class="block">Numer Telefonu</label>
                <input type="tel" name="phoneNumber" id="phoneNumber" value="<?= htmlspecialchars($user['phoneNumber']) ?>" class="w-full p-2 border border-gray-300" required>
            </div>
            <div>
                <label for="region" class="block">Region</label>
                <input type="text" name="region" id="region" value="<?= htmlspecialchars($user['region']) ?>" class="w-full p-2 border border-gray-300" required>
            </div>
            <div>
                <label for="role" class="block">Rola</label>
                <select name="role" id="role" class="w-full p-2 border border-gray-300" required>
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Użytkownik</option>
                    <option value="worker" <?= $user['role'] == 'worker' ? 'selected' : '' ?>>Pracownik</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
                </select>
            </div>
            <div>
                <label for="verified" class="block">Zweryfikowany</label>
                <input type="checkbox" name="verified" id="verified" <?= $user['verified'] ? 'checked' : '' ?>>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Zapisz zmiany</button>
            </div>
        </form>
    </div>
</div>
  <footer class="text-center lg:text-left mt-2">
    <div class="bg-blue2 p-4 text-center text-surface dark:text-white">
      © 2024 Copyright:
      <a href="./home.php">Titanium Tower</a>
    </div>
  </footer>
</body>
</html>
