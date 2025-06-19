<?php
require_once 'server/Server.php';

$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if ($password !== $confirm) {
    echo "Пароли не совпадают!";
    exit;
}

// Проверка на существующего пользователя
$exists = $server->query("SELECT * FROM Users WHERE Phone = :phone", ['phone' => $phone]);

if ($exists) {
    echo "Такой пользователь уже есть.";
    exit;
}

// Хеширование пароля
$hash = password_hash($password, PASSWORD_DEFAULT);

// По умолчанию назначим роль "Пользователь" (ID = 1)
$server->exec("INSERT INTO Users (ID_Access_rights, Phone, Password) VALUES (1, :phone, :pass)", [
    'phone' => $phone,
    'pass' => $hash
]);

redir("login.php");
