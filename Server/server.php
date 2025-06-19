<?php
session_start();

class Server
{
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $db = 'bakery_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(":$key", $val);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exec($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(":$key", $val);
            }
        }
        return $stmt->execute();
    }
}

// Функция редиректа
function redir($to)
{
    header("Location: $to");
    exit;
}

// Инициализация сервера
$server = new Server();

// Проверка сессии
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = null;
}
?>
