<?php
namespace Service;

use Entity\Todolist;
use Repository\TodolistRepository;

interface TodolistService
{
    function showTodolist(): void;
    function addTodolist(string $todo): void;
    function removeTodolist(int $number): void;
}

class TodolistServiceImpl implements TodolistService
{
    private TodolistRepository $todolist_repo;
    public function __construct(TodolistRepository $todolist_repo)
    {
        $this->todolist_repo = $todolist_repo;
    }
    function showTodolist(): void
    {
        echo 'TODOLIST' . PHP_EOL;
        $todolists = $this->todolist_repo->findAll();
        foreach ($todolists as $number => $todolist) {
            echo "{$todolist->getId()}. {$todolist->getTodo()}" . PHP_EOL;
        }
    }
    function addTodolist(string $todo): void
    {
        $todolist = new Todolist($todo);
        $this->todolist_repo->save($todolist);
        echo 'SUKSES MENAMBAH TODOLIST' . PHP_EOL;
    }
    function removeTodolist(int $number): void
    {
        if($this->todolist_repo->remove($number)) {
            echo 'SUKSES MENGHAPUS TODOLIST' . PHP_EOL;
        } else {
            echo 'GAGAL MENGHAPUS TODOLIST' . PHP_EOL;
        }
    }
}

?>