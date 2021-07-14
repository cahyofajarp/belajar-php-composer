<?php

namespace Repository{

    use Entity\Todolist;
    
    interface TodolistRepository{
    
        function save(Todolist $todolist): void;

        function update(int $number,Todolist $todolist): bool;

        function remove(int $number):bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository{
        
        private array $todolist = array();

        private \PDO $connection; 

        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(Todolist $todolist): void
        {

            $sql = "INSERT INTO todolist(todo) VALUE (?)";
            
            $statment = $this->connection->prepare($sql);
            
            $statment->execute([$todolist->getTodo()]);

            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;
        }  
        
        function update(int $number,Todolist $todolist): bool
        {
            $checkData = "SELECT id FROM  todolist WHERE id = ?";
            
            $statment = $this->connection->prepare($checkData);

            $statment->execute([$number]);

            if($statment->fetch()){
                
                $sql = "UPDATE todolist SET todo=? WHERE id=?";
                
                $statment = $this->connection->prepare($sql);
                
                $statment->execute([$todolist->getTodo(),$number]);
            

                return true;
            }
            else{
                return false;
            }
            // $updateTodo = $todolist;

            // if($number > sizeof($this->todolist)){
            //     return false;
            // }
        
            // $this->todolist[$number] = $updateTodo;
            
            // return true;

            
        }

        function remove(?int $number):bool
        {
            // if($number > sizeof($this->todolist)){
            //     return false;
            // }
        
            // for($i = $number; $i < sizeof($this->todolist);$i++){
            //     $this->todolist[$i] = $this->todolist[$i + 1];
            // }
        
            // // var_dump($todoList);
            // unset($this->todolist[sizeof($this->todolist)]);
            $checkData = "SELECT id FROM  todolist WHERE id = ?";
            $statment = $this->connection->prepare($checkData);
            $statment->execute([$number]);
            

            if($statment->fetch()){
                    
                $sql = "DELETE FROM todolist WHERE id= ? ";
                $statment = $this->connection->prepare($sql);
                $statment->execute([$number]);
                return true;
            }
            else{
                return false;
            }


        }

        function findAll(): array
        {
            $sql = "SELECT id,todo FROM todolist";
            $statment = $this->connection->prepare($sql);
            $statment->execute();

            $result = [];

            foreach($statment as $row){

                $todolist = new Todolist();

                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);


                $result[] = $todolist;

            }

            return $result;
        }
    }
}

