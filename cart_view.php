<?php
require_once 'server/Server.php';
if (!$_SESSION['user']) redir("login.php");

$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина — Пекарня "Вкусно и все"</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
      <div class="header-left">
        <button class="icon-button" onclick="window.location.href='cart_view.php'">
          <img src="https://cdn-icons-png.flaticon.com/512/833/833314.png" alt="Корзина">
          <span>Корзина</span>
          <?php 
          $cartCount = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
          if ($cartCount > 0): ?>
            <span class="cart-count"><?php echo $cartCount; ?></span>
          <?php endif; ?>
        </button>
        <?php if ($_SESSION['user']): ?>
          <a href="logout.php" class="fancy-button">Выйти</a>
          <a href="control.php" class="fancy-button">Товар</a>
        <?php endif; ?>
      </div>

      <a href="index.php" class="logo">
        <span class="logo-icon"></span>
        Пекарня "Вкусно и все"
      </a>
    
      <nav>
        <ul>
          <li><a href="products.php">Меню</a></li>
          <li><a href="about_us.php">О нас</a></li>
          <li><a href="contact.php">Контакты</a></li>
        </ul>
      </nav>
    </header>

<main>
    <div class="cart-container">
        <div class="cart-header">
            <img src="https://cdn-icons-png.flaticon.com/512/833/833314.png" alt="Корзина">
            Ваша корзина
        </div>
        
        <?php if (empty($cart)): ?>
            <div class="cart-empty">
                <img src="https://cdn-icons-png.flaticon.com/512/833/833314.png" alt="Пустая корзина">
                <h3>Корзина пуста</h3>
                <p>Добавьте товары из нашего меню, чтобы сделать заказ</p>
                <a href="products.php" class="fancy-button">Перейти к меню</a>
            </div>
        <?php else: ?>
            <div class="cart-grid">
                <div class="cart-products">
                    <?php 
                    $total = 0;
                    $productData = [
                        1 => ['name' => 'Булочка с корицей', 'price' => 2.50, 'image' => 'https://fort.crimea.com/catering/uploads/fotos/f07c8f16-9115-11ed-bba6-00155d00fb0d_1.jpg', 'description' => 'Мягкая, сладкая и ароматная'],
                        2 => ['name' => 'Домашний хлеб', 'price' => 3.20, 'image' => 'https://shop.remit.ru/upload/iblock/413/rz6m7itikicocxst0iro5q33ca12323t.jpeg', 'description' => 'Из цельнозерновой муки с хрустящей коркой'],
                        3 => ['name' => 'Шоколадный торт', 'price' => 15.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStCuIHH5W69Im0rvHffq3YAFVkFlLWC0EqKA&s', 'description' => 'Нежный шоколадный бисквит с кремом'],
                        4 => ['name' => 'Хлеб ржаной', 'price' => 2.50, 'image' => 'https://img.sergiev-kanon.ru/files/1/7956/33791764/original/mceu_727977428111710332339791-1710332339824.jpg', 'description' => 'Классический тёмный хлеб на закваске'],
                        5 => ['name' => 'Сметанник', 'price' => 4.80, 'image' => 'https://zira.uz/wp-content/uploads/2019/11/smetannik-2.jpg', 'description' => 'Мягкий бисквитный корж и нежный крем'],
                        6 => ['name' => 'Булочка с корицей', 'price' => 1.90, 'image' => 'https://fort.crimea.com/catering/uploads/fotos/f07c8f16-9115-11ed-bba6-00155d00fb0d_1.jpg', 'description' => 'Пышная, сладкая, ароматная'],
                        7 => ['name' => 'Хлеб белый', 'price' => 1.50, 'image' => 'product_images/6854508709415.png', 'description' => 'Свежий белый хлеб с хрустящей корочкой'],
                        8 => ['name' => 'Шоколадный торт', 'price' => 15.00, 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStCuIHH5W69Im0rvHffq3YAFVkFlLWC0EqKA&s', 'description' => 'Нежный шоколадный бисквит с кремом'],
                        9 => ['name' => 'Печенье овсяное', 'price' => 3.20, 'image' => 'https://img.sergiev-kanon.ru/files/1/7956/33791764/original/mceu_727977428111710332339791-1710332339824.jpg', 'description' => 'Полезное овсяное печенье с изюмом']
                    ];
                    
                    foreach ($cart as $productId => $quantity):
                        if (isset($productData[$productId])):
                            $product = $productData[$productId];
                            $itemTotal = $product['price'] * $quantity;
                            $total += $itemTotal;
                    ?>
                        <div class="cart-product-card">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                            <div class="cart-product-info">
                                <h3><?php echo $product['name']; ?></h3>
                                <p><?php echo $product['description']; ?></p>
                                <div class="cart-product-price">Цена: <?php echo number_format($product['price'], 2); ?> BYN</div>
                            </div>
                            <div class="cart-product-controls">
                                <div class="cart-product-quantity">
                                    <button class="quantity-btn" onclick="updateQuantity(<?php echo $productId; ?>, -1)">-</button>
                                    <input type="number" class="quantity-input" value="<?php echo $quantity; ?>" min="1" max="20" data-product="<?php echo $productId; ?>" data-initial="<?php echo $quantity; ?>" onchange="setQuantity(<?php echo $productId; ?>, this)">
                                    <button class="quantity-btn" onclick="updateQuantity(<?php echo $productId; ?>, 1)">+</button>
                                </div>
                                <div class="cart-product-price">Сумма: <?php echo number_format($itemTotal, 2); ?> BYN</div>
                                <button class="cart-product-remove" onclick="removeItem(<?php echo $productId; ?>)">Удалить</button>
                            </div>
                        </div>
                    <?php endif; endforeach; ?>
                </div>
                <div class="cart-summary-panel">
                    <h3>Оформление заказа</h3>
                    <div class="cart-total">
                        <span>Итого:</span>
                        <span><?php echo number_format($total, 2); ?> BYN</span>
                    </div>
                    <form onsubmit="checkout(); return false;">
                        <label for="address">Адрес доставки</label>
                        <input type="text" id="address" name="address" placeholder="Введите адрес..." required>
                        <button type="submit" class="fancy-button">Оформить заказ</button>
                    </form>
                    <button class="fancy-button" style="background:#eee;color:var(--hover);margin-top:0.5rem;" onclick="clearCart()">Очистить корзину</button>
                    <a href="products.php" class="fancy-button" style="background:var(--accent);color:#fff;margin-top:0.5rem;">Продолжить покупки</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script src="faq.js"></script>
<script src="hidden_text.js"></script>
<script src="cart.js"></script>
<script>
function toggleSearch() {
  const form = document.getElementById('headerSearchForm');
  form.classList.toggle('open');
  if (form.classList.contains('open')) {
    document.getElementById('headerSearchInput').focus();
  }
}
function searchProducts(e) {
  e.preventDefault();
  const val = document.getElementById('headerSearchInput').value.trim();
  if (val.length > 0) {
    window.location.href = 'products.php?search=' + encodeURIComponent(val);
  }
  return false;
}
</script>

<footer>
    <p>&copy; 2025 Пекарня "Вкусно и все". Все права защищены.</p>
    <div class="social-buttons">
        <a href="https://t.me/your_channel" class="social-btn tg" target="_blank">
          <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram">
        </a>
        <a href="https://vk.com/your_page" class="social-btn vk" target="_blank">
          <img src="https://cdn-icons-png.flaticon.com/512/145/145813.png" alt="VK">
        </a>
      </div>
</footer>

</body>
</html>

