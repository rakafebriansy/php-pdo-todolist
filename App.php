<?php

require_once __DIR__ . '/Entity/Todolist.php';
require_once __DIR__ . '/Repository/TodolistRepository.php';
require_once __DIR__ . '/Service/TodolistService.php';
require_once __DIR__ . '/View/TodolistView.php';
require_once __DIR__ . '/Helper/InputHelper.php';
require_once __DIR__ . '/Config/Database.php';

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Config\Database;

echo 'Aplikasi TodoList' . PHP_EOL;

$connection = Database::getConnection();
$todolist_repo = new TodolistRepositoryImpl($connection);
$todolist_service = new TodolistServiceImpl($todolist_repo);
$todolist_view = new TodolistView($todolist_service);

$todolist_view->showTodoList();
?>