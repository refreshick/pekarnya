<?php require_once 'server/Server.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Добавить блюдо</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .admin-panel {
      max-width: 500px;
      margin: 60px auto;
      padding: 30px;
      background-color: var(--white);
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .admin-panel h2 {
      text-align: center;
      margin-bottom: 20px;
      color: var(--hover);
    }

    .admin-panel form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .admin-panel input,
    .admin-panel textarea,
    .admin-panel select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .admin-panel input[type="file"] {
      padding: 5px;
    }

    .admin-panel button {
      background-color: var(--hover);
      color: white;
      border: none;
      padding: 10px;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .admin-panel button:hover {
      background-color: var(--dark);
    }
  </style>
</head>
<body>
  <div class="admin-panel">
    <h2>Добавить блюдо</h2>
    <form action="createProduct.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Название блюда" required>
      <textarea name="description" placeholder="Описание" rows="4"></textarea>
      <input type="number" name="price" step="0.01" placeholder="Цена (BYN)" required>

      <!-- Категории можно будет выводить из БД -->
      <select name="category">
        <option value="1">Булочки</option>
        <option value="2">Хлеб</option>
        <option value="3">Торты</option>
        <option value="4">Печенье</option>
      </select>

      <input type="file" name="image" required>
      <button type="submit">Сохранить</button>
    </form>
  </div>
</body>
</html>
