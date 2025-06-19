<?php
require_once 'server/Server.php';

$phone = $_POST['phone'];
$password = $_POST['password'];

// Получаем пользователя
$user = $server->query("SELECT * FROM Users WHERE Phone = :phone", ['phone' => $phone]);

if (!$user) {
    echo "Пользователь не найден.";
    exit;
}

$user = $user[0];

// Проверка пароля
if (password_verify($password, $user['Password'])) {
    $_SESSION['user'] = $user; // сохраняем всю строку
    redir("index.php");
} else {
    echo "Неверный пароль.";
}
