<?php require_once 'server/Server.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Регистрация</h2>
    <form action="register_action.php" method="POST">
      <input type="text" name="phone" placeholder="Телефон" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <input type="password" name="confirm" placeholder="Повторите пароль" required>
      <button type="submit" class="fancy-button">Зарегистрироваться</button>
      <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </form>
  </div>
</body>
</html>
