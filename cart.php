<?php
require_once 'server/Server.php';

// Инициализируем корзину в сессии
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Очистка корзины
if (isset($_GET['clear']) && $_GET['clear'] == 1) {
    $_SESSION['cart'] = [];
    redir('cart_view.php');
}

// Получаем ID блюда и количество из запроса
$id    = isset($_GET['id'])    ? (int)$_GET['id']   : 0;
$count = isset($_GET['count']) ? (int)$_GET['count']: 1;

// Приводим количество к диапазону [1,20]
$count = max(1, min(20, $count));

if ($id > 0) {
    if (isset($_SESSION['cart'][$id])) {
        // Уже есть в корзине — суммируем
        $newQuantity = $_SESSION['cart'][$id] + $count;
        
        if ($newQuantity <= 0) {
            // Удаляем товар из корзины
            unset($_SESSION['cart'][$id]);
        } else {
            // Обновляем количество
            $_SESSION['cart'][$id] = min(20, $newQuantity);
        }
    } else {
        // Новая запись (только если количество положительное)
        if ($count > 0) {
            $_SESSION['cart'][$id] = $count;
        }
    }
}

// Перенаправляем обратно на страницу корзины
redir('cart_view.php');
