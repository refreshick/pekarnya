<?php require_once 'server/Server.php'; ?>
<?php if (!$_SESSION['user']) redir("login.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать в нашу пекарню</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="faq.js"></script>
    <script src="hidden_text.js"></script>
    <script src="cart.js"></script>
    
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
    <section class="hero">
        <h1>Свежая выпечка каждый день</h1>
        <p>Мы готовим с любовью из натуральных ингредиентов. Наши мастера создают неповторимые вкусы, которые запомнятся надолго.</p>
        <a href="products.php" class="fancy-button">Перейти к меню</a>
    </section>

    <section class="products">
        <h2>Популярные товары</h2>
        <div class="product-list">
            <div class="product">
              <img src="https://fort.crimea.com/catering/uploads/fotos/f07c8f16-9115-11ed-bba6-00155d00fb0d_1.jpg" alt="Булочка с корицей">
              <h3>Булочка с корицей</h3>
              <p>Мягкая, сладкая и ароматная булочка с корицей и сахарной глазурью</p>
              <div class="product-price">2.50 BYN</div>
              <button class="fancy-button" onclick="addToCart(1, 1)">Добавить в корзину</button>
            </div>
            <div class="product">
              <img src="https://shop.remit.ru/upload/iblock/413/rz6m7itikicocxst0iro5q33ca12323t.jpeg" alt="Домашний хлеб">
              <h3>Домашний хлеб</h3>
              <p>Из цельнозерновой муки с хрустящей коркой и нежным мякишем</p>
              <div class="product-price">3.20 BYN</div>
              <button class="fancy-button" onclick="addToCart(2, 1)">Добавить в корзину</button>
            </div>
            <div class="product">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStCuIHH5W69Im0rvHffq3YAFVkFlLWC0EqKA&s" alt="Шоколадный торт">
              <h3>Шоколадный торт</h3>
              <p>Идеален для праздника или в подарок. Нежный шоколадный бисквит с кремом</p>
              <div class="product-price">15.00 BYN</div>
              <button class="fancy-button" onclick="addToCart(3, 1)">Добавить в корзину</button>
            </div>
        </div>
    </section>
</main>

<script>
function addToCart(productId, quantity) {
    window.location.href = `cart.php?id=${productId}&count=${quantity}`;
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
