<?php
session_start();
require_once '../db.php';

// Połączenie z bazą danych
$db = dbConnect();

// Pobieranie danych użytkowników z rolą "worker"
$query = 'SELECT * FROM user WHERE role = "worker"';
$result = $db->query($query);
$users = [];
if ($result->num_rows > 0) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pracownicy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container p-4 w-full mt-28">
        <h1 class="text-2xl font-bold mb-4">Lista Pracowników</h1>
        <table class="border-collapse border border-slate-600 w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-slate-600">ID</th>
                    <th class="py-2 px-4 border-slate-600">E-mail</th>
                    <th class="py-2 px-4 border-slate-600">Imię</th>
                    <th class="py-2 px-4 border border-slate-600">Nazwisko</th>
                    <th class="py-2 px-4 border border-slate-600">Numer Telefonu</th>
                    <th class="py-2 px-4 border border-slate-600">Region</th>
                    <th class="py-2 px-4 border border-slate-600">Rola</th>
                    <th class="py-2 px-4 border border-slate-600">Zweryfikowany</th>
                    <th class="py-2 px-4 border border-slate-600"></th>
                    <th class="py-2 px-4 border border-slate-600"></th>
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
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['role']) ?></td>
                        <td class="py-2 px-4 border border-slate-600"><?= htmlspecialchars($user['verified'] ? 'Tak' : 'Nie') ?></td>
                        <td class="py-3 px-5 border border-slate-600">
                          <a href="index.php?action=editWorker&id=<?= htmlspecialchars($user['ID']) ?>" class="bg-blue-600 text-white py-2 px-3 rounded-md font-medium">Edytuj</a>
                        </td>
                        <td class="py-2 px-5 border border-slate-600">
                          <a href="index.php?action=deleteWorker&id=<?= htmlspecialchars($user['ID']) ?>" class="bg-red-600 text-white font-medium rounded-md py-2 px-3" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td class="py-2 px-4 border-b" colspan="10">Brak pracowników.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>