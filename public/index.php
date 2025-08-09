<!--
    Centraliza todas as requisições
    Vão ficar as configurações iniciais
    Roteamento inteligente
    
 
-->


<?php
require __DIR__ . '/../config/database.php';
$routes = require __DIR__ . '/../config/routes.php';

// Inicia a conexão PDO
try {
    $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], $config['options']);
} catch (PDOException $e) {
    die('Erro de conexão: '. $e->getMessage());
}

// Roteamento
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$routeKey = "$method $path";

// Verifica rota existente
if (isset($routes[$routeKey])) {
    [$controllerName, $action] = $routes[$routeKey];
    $controller = new $controllerName($pdo);

    // Extrai ID para rotas dinâmicas
    if (preg_match('/\{id\}/', $routeKey)) {
        preg_match('/\d+/', $path, $matches);
        $id = $matches[0] ?? null;
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    http_response_code(404);
    echo "Página não encontrada";
}
?>