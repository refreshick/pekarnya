<?php
require_once 'server/Server.php';

// Функция загрузки изображения
function upload_image($file)
{
    $upload_dir = 'product_images/';
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_name = uniqid() . '.' . $ext;
    $target = $upload_dir . $new_name;

    if (move_uploaded_file($file['tmp_name'], $target)) {
        return $new_name;
    } else {
        return null;
    }
}

// Получаем поля
$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
$image = upload_image($_FILES['image']);

if (!$image) {
    die("Ошибка загрузки изображения");
}

// Вставка в таблицу Dishes
$server->exec(
    "INSERT INTO Dishes (ID_Category, Name, Description, Price, image_path)
     VALUES (1, :name, :desc, :price, :img)",
    [
        'name' => $name,
        'desc' => $desc,
        'price' => $price,
        'img' => $image
    ]
);

redir("menu.php");
