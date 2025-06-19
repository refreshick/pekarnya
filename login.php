<?php require_once 'server/Server.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Вход</h2>
    <form action="login_action.php" method="POST">
      <input type="text" name="phone" placeholder="Телефон" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button type="submit" class="fancy-button">Войти</button>
      <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
    </form>
  </div>
</body>
</html>
