<?php

namespace View;

use Entity\Todolist;
use Service\TodolistService;
use Helper\InputHelper;

class TodolistView
{
    private TodolistService $todolist_service;
    public function __construct(TodolistService $todolist_service)
    {   
        $this->todolist_service = $todolist_service;
    }
    function showTodoList()
    {
        while (true) {
            $this->todolist_service->showTodoList();
        
            echo 'MENU' . PHP_EOL;
            echo '1. Tambah Todo' . PHP_EOL;
            echo '2. Hapus Todo' . PHP_EOL;
            echo 'x. Keluar' . PHP_EOL;
        
            $pilihan = InputHelper::input("Pilih");
            if ($pilihan == '1'){
                $this->addTodoList();
            } else if ($pilihan == '2'){
                $this->removeTodoList();
            } else if ($pilihan == 'x') {
                break;
            } else {
                echo 'Pilihan tidak dimengerti' . PHP_EOL;
            }
        }
        echo 'Sampai Jumpa Lagi.' . PHP_EOL;
    }
    function addTodolist(): void
    {
        echo 'MENAMBAH TODO' . PHP_EOL;
        $todo = InputHelper::input('Todo (x untuk Batal)');
        if ($todo == 'x') {
            echo 'Batal menambah todo' . PHP_EOL;
        } else {
            $this->todolist_service->addTodoList($todo);
        }
    }
    function removeTodolist(): void
    {
        echo 'MENGHAPUS TODO' . PHP_EOL;
        $pilihan = InputHelper::input('Nomor (x untuk batal)');
        if ($pilihan == 'x'){
            echo 'Batal menghapus todo' . PHP_EOL;
        } else if (is_numeric($pilihan)) {
            $this->todolist_service->removeTodolist($pilihan);
        } else {
            echo 'Pilihan tidak dimengerti' . PHP_EOL;
        }
    }
}

?>