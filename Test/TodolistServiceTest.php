<?php
require_once __DIR__ . '/../Entity/Todolist.php';
require_once __DIR__ . '/../Repository/TodolistRepository.php';
require_once __DIR__ . '/../Service/TodolistService.php';
require_once __DIR__ . '/../Config/Database.php';

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolist_repo = new TodolistRepositoryImpl($connection);
    $todolist_service = new TodolistServiceImpl($todolist_repo);
    $todolist_service->addTodolist('Belajar PHP MySQL');
    
    $todolist_service->showTodolist();
}
function testAddTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolist_repo = new TodolistRepositoryImpl($connection);
    $todolist_service = new TodolistServiceImpl($todolist_repo);

    $todolist_service->addTodolist('Belajar PHP');
    $todolist_service->addTodolist('Belajar PHP OOP');
    $todolist_service->addTodolist('Belajar PHP Database');
}
function testRemoveTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolist_repo = new TodolistRepositoryImpl($connection);
    $todolist_service = new TodolistServiceImpl($todolist_repo);

    echo $todolist_service->removeTodolist(1) . PHP_EOL;
    echo $todolist_service->removeTodolist(3) . PHP_EOL;
}
testShowTodolist();
// testAddTodolist();
// testRemoveTodolist();
?>