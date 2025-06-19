<?php require_once 'server/Server.php'; ?>
<?php if (!$_SESSION['user']) redir("login.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты — Пекарня "Вкусно и все"</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="faq.js"></script>
    <script src="hidden_text.js"></script>
    
    <header>
      <div class="header-left">
        <button class="icon-button" onclick="alert('Функция поиска в разработке')">
          <img src="https://cdn-icons-png.flaticon.com/512/751/751463.png" alt="Поиск">
        </button>
        <button class="icon-button" onclick="window.location.href='cart_view.php'">
          <img src="https://cdn-icons-png.flaticon.com/512/833/833314.png" alt="Корзина">
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
    
      <a href="index.php" class="logo">Пекарня "Вкусно и все"</a>
    
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
      <h1>Свяжитесь с нами</h1>
      <p>Мы всегда рады обратной связи и новым заказам</p>
    </section>
  
    <section class="contact-info" style="padding: 4rem 2rem; background: var(--white);">
      <div class="contact-container" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
        <div class="contact-form" style="background: var(--bg-light); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow);">
          <h2 style="color: var(--hover); margin-bottom: 2rem; text-align: center;">Написать нам</h2>
          <form style="display: flex; flex-direction: column; gap: 1rem;">
            <input type="text" placeholder="Ваше имя" required style="padding: 1rem; border: 1px solid var(--accent); border-radius: 8px; font-size: 1rem;">
            <input type="email" placeholder="Email" required style="padding: 1rem; border: 1px solid var(--accent); border-radius: 8px; font-size: 1rem;">
            <textarea placeholder="Сообщение" rows="5" required style="padding: 1rem; border: 1px solid var(--accent); border-radius: 8px; font-size: 1rem; resize: vertical;"></textarea>
            <button type="submit" class="fancy-button" style="margin-top: 1rem;">Отправить сообщение</button>
          </form>
        </div>
  
        <div class="contact-map" style="background: var(--bg-light); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow);">
          <h2 style="color: var(--hover); margin-bottom: 2rem; text-align: center;">Как нас найти</h2>
          <div style="background: var(--white); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
            <h3 style="color: var(--hover); margin-bottom: 1rem;">Наш адрес:</h3>
            <p style="line-height: 1.6; margin-bottom: 1rem;">ул. Пекарная, 15<br>Минск, Беларусь</p>
            <h3 style="color: var(--hover); margin-bottom: 1rem;">Телефон:</h3>
            <p style="line-height: 1.6; margin-bottom: 1rem;">+375 (29) 123-45-67</p>
            <h3 style="color: var(--hover); margin-bottom: 1rem;">Email:</h3>
            <p style="line-height: 1.6;">info@pekarnya.by</p>
          </div>
          <iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3A74bd3e801d56c5a8ea74fa6eaa36c6bd3caa92f78a735c9691ad3483893c9c40&amp;source=constructor"
            width="100%" height="300" frameborder="0" allowfullscreen style="border-radius: 10px;">
          </iframe>
        </div>
      </div>
    </section>
  </main>

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
