<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:server=localhost;dbname=notes", 'admin', 'admin');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getNotes()
    {
        $statment = $this->pdo->prepare('SELECT * FROM notes ORDER BY create_date DESC');
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }

    function addNote($note)
    {
        $statment = $this->pdo->prepare("INSERT INTO notes (title,description,create_date) 
                                         VALUES (:title,:description,:date)");
        $statment->bindValue('title', $note['title']);
        $statment->bindValue('description', $note['description']);
        $statment->bindValue('date', date('Y-m-d H:i:s'));
        return $statment->execute();
    }
}
return new Connection();
