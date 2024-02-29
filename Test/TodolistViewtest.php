<?php
require_once __DIR__ . '/../Entity/Todolist.php';
require_once __DIR__ . '/../Repository/TodolistRepository.php';
require_once __DIR__ . '/../Service/TodolistService.php';
require_once __DIR__ . '/../View/TodolistView.php';
require_once __DIR__ . '/../Helper/InputHelper.php';
require_once __DIR__ . '/../Config/Database.php';

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewShowTodolist(): void
{
    $connection = \Config\Database::getConnection();
    $todolist_repo = new TodolistRepositoryImpl($connection);
    $todolist_service = new TodolistServiceImpl($todolist_repo);
    $todolist_view = new TodolistView($todolist_service);

    $todolist_service->addTodolist('Belajar PHP');
    $todolist_service->addTodolist('Belajar PHP OOP');
    $todolist_service->addTodolist('Belajar PHP Database');

    $todolist_view->showTodoList();
}
function testViewAddTodolist(): void
{
    $todolist_repo = new TodolistRepositoryImpl();
    $todolist_service = new TodolistServiceImpl($todolist_repo);
    $todolist_view = new TodolistView($todolist_service);

    $todolist_service->addTodolist('Belajar PHP');
    $todolist_service->addTodolist('Belajar PHP OOP');
    $todolist_service->addTodolist('Belajar PHP Database');

    $todolist_service->showTodolist();
    $todolist_view->addTodoList();
    $todolist_service->showTodolist();
}
function testViewRemoveTodolist(): void
{
    $todolist_repo = new TodolistRepositoryImpl();
    $todolist_service = new TodolistServiceImpl($todolist_repo);
    $todolist_view = new TodolistView($todolist_service);

    $todolist_service->addTodolist('Belajar PHP');
    $todolist_service->addTodolist('Belajar PHP OOP');
    $todolist_service->addTodolist('Belajar PHP Database');

    $todolist_service->showTodolist();
    $todolist_view->removeTodolist();
    $todolist_service->showTodolist();
}
// testViewShowTodolist();
// testViewAddTodolist();
testViewRemoveTodolist();
?>