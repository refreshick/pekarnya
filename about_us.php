<?php require_once 'server/Server.php'; ?>
<?php if (!$_SESSION['user']) redir("login.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас — Пекарня "Вкусно и все"</title>
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
        <h1>Наша история</h1>
        <p>С любовью к традициям и качеству с 2010 года</p>
    </section>

    <section class="products">
        <h2>Кто мы</h2>
        <div style="max-width: 800px; margin: 0 auto; padding: 2rem; background: var(--white); border-radius: 15px; box-shadow: var(--shadow);">
            <p style="line-height: 1.8; font-size: 1.1rem; margin-bottom: 2rem;">
                Мы — команда пекарей, объединившихся, чтобы создавать вкусную, натуральную и ароматную выпечку. В нашей пекарне мы используем только проверенные рецепты, отборные ингредиенты и душевный подход к каждому изделию.
            </p>
            <p style="line-height: 1.8; font-size: 1.1rem;">
                Наша миссия — приносить радость и тепло в каждый дом через аромат свежей выпечки. Мы гордимся тем, что наши клиенты возвращаются к нам снова и снова, доверяя качеству наших изделий.
            </p>
        </div>
    </section>
    
    <section class="faq" style="background: var(--bg-light); padding: 4rem 2rem;">
        <h2 style="text-align: center; margin-bottom: 3rem;">Часто задаваемые вопросы</h2>
      
        <div class="faq-item" style="max-width: 800px; margin: 0 auto 1rem; background: var(--white); padding: 1.5rem; border-radius: 10px; box-shadow: var(--shadow);">
          <div class="faq-question" style="font-weight: bold; color: var(--hover); cursor: pointer; margin-bottom: 0.5rem;">Какие у вас часы работы?</div>
          <div class="faq-answer" style="color: var(--text); line-height: 1.6;">Мы открыты ежедневно с 8:00 до 20:00.</div>
        </div>
      
        <div class="faq-item" style="max-width: 800px; margin: 0 auto 1rem; background: var(--white); padding: 1.5rem; border-radius: 10px; box-shadow: var(--shadow);">
          <div class="faq-question" style="font-weight: bold; color: var(--hover); cursor: pointer; margin-bottom: 0.5rem;">Можно ли сделать индивидуальный заказ?</div>
          <div class="faq-answer" style="color: var(--text); line-height: 1.6;">Да, мы принимаем индивидуальные заказы — свяжитесь с нами заранее.</div>
        </div>
      
        <div class="faq-item" style="max-width: 800px; margin: 0 auto 1rem; background: var(--white); padding: 1.5rem; border-radius: 10px; box-shadow: var(--shadow);">
          <div class="faq-question" style="font-weight: bold; color: var(--hover); cursor: pointer; margin-bottom: 0.5rem;">Делаете ли вы доставку?</div>
          <div class="faq-answer" style="color: var(--text); line-height: 1.6;">Да, доставка по городу доступна через партнёрские службы.</div>
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
