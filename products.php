<?php require_once 'server/Server.php'; ?>
<?php if (!$_SESSION['user']) redir("login.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продукция — Пекарня "Вкусно и все"</title>
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
    <section class="products">
        <h2>Меню нашей пекарни</h2>
        <div class="category-bar">
            <button class="category-btn active" onclick="filterProducts('all')">Все</button>
            <button class="category-btn" onclick="filterProducts('bread')">Хлеб</button>
            <button class="category-btn" onclick="filterProducts('cake')">Торты</button>
            <button class="category-btn" onclick="filterProducts('bun')">Булочки</button>
            <button class="category-btn" onclick="filterProducts('cookie')">Печенье</button>
          </div>     
        <div class="product-list">
      
          <div class="product-card" data-category="bread">
            <img src="https://img.sergiev-kanon.ru/files/1/7956/33791764/original/mceu_727977428111710332339791-1710332339824.jpg" alt="Хлеб ржаной">
            <div class="product-info">
              <h3>Хлеб ржаной</h3>
              <p>Классический тёмный хлеб на закваске с насыщенным вкусом</p>
              <span class="price">2.50 BYN</span>
              <button class="fancy-button" onclick="addToCart(4, 1)">Добавить в корзину</button>
            </div>
          </div>

     
      
          <div class="product-card" data-category="cake">
            <img src="https://zira.uz/wp-content/uploads/2019/11/smetannik-2.jpg" alt="Сметанник">
            <div class="product-info">
              <h3>Сметанник</h3>
              <p>Мягкий бисквитный корж и нежный крем из сметаны</p>
              <span class="price">4.80 BYN</span>
              <button class="fancy-button" onclick="addToCart(5, 1)">Добавить в корзину</button>
            </div>
          </div>
      
          <div class="product-card" data-category="bun">
            <img src="https://fort.crimea.com/catering/uploads/fotos/f07c8f16-9115-11ed-bba6-00155d00fb0d_1.jpg" alt="Булочка с корицей">
            <div class="product-info">
              <h3>Булочка с корицей</h3>
              <p>Пышная, сладкая, ароматная булочка с корицей</p>
              <span class="price">1.90 BYN</span>
              <button class="fancy-button" onclick="addToCart(6, 1)">Добавить в корзину</button>
            </div>
          </div>
      
          <div class="product-card" data-category="bread">
            <img src="product_images\6854508709415.png" alt="Хлеб белый">
            <div class="product-info">
              <h3>Хлеб белый</h3>
              <p>Свежий белый хлеб с хрустящей корочкой</p>
              <span class="price">1.50 BYN</span>
              <button class="fancy-button" onclick="addToCart(7, 1)">Добавить в корзину</button>
            </div>
          </div>

          <div class="product-card" data-category="cake">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStCuIHH5W69Im0rvHffq3YAFVkFlLWC0EqKA&s" alt="Шоколадный торт">
            <div class="product-info">
              <h3>Шоколадный торт</h3>
              <p>Нежный шоколадный бисквит с шоколадным кремом</p>
              <span class="price">15.00 BYN</span>
              <button class="fancy-button" onclick="addToCart(8, 1)">Добавить в корзину</button>
            </div>
          </div>

          <div class="product-card" data-category="cookie">
            <img src="https://img.sergiev-kanon.ru/files/1/7956/33791764/original/mceu_727977428111710332339791-1710332339824.jpg" alt="Печенье овсяное">
            <div class="product-info">
              <h3>Печенье овсяное</h3>
              <p>Полезное овсяное печенье с изюмом и орехами</p>
              <span class="price">3.20 BYN</span>
              <button class="fancy-button" onclick="addToCart(9, 1)">Добавить в корзину</button>
            </div>
          </div>

        </div>
      </section>      
</main>

<script>
function addToCart(productId, quantity) {
    window.location.href = `cart.php?id=${productId}&count=${quantity}`;
}

function filterProducts(category) {
    // Убираем активный класс со всех кнопок
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Добавляем активный класс к нажатой кнопке
    event.target.classList.add('active');
    
    // Показываем/скрываем товары
    const products = document.querySelectorAll('.product-card');
    products.forEach(product => {
        if (category === 'all' || product.dataset.category === category) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
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
