<?php
$dbConfig = include('../config/database.php');
require_once '../app/controllers/UserController.php';

$userController = new UserController($dbConfig);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/index.php') {
    include '../app/views/users.php';

} elseif ($uri === '/api/list-users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController->index();

} elseif ($uri === '/api/create-user' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->store(); 

} elseif (preg_match('/^\/api\/edit-user\/([0-9]+)$/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController->edit($matches[1]);

} elseif (preg_match('/^\/api\/update-user\/([0-9]+)$/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->update($matches[1]);

} elseif (preg_match('/^\/api\/delete-user\/([0-9]+)$/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $userController->delete($matches[1]);
    
} else {
    http_response_code(404);
    echo json_encode(['error' => '404 Not Found']);
}