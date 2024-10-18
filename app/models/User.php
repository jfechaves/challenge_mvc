<?php

class User
{
    private $pdo;

    public function __construct($dbConfig)
    {
        $this->pdo = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",$dbConfig['username'],$dbConfig['password']);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, status, admitted_at, created_at) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $data['status'], $data['admitted_at'], date('Y-m-d H:i')]);
    }

    public function readAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, status = ?, admitted_at = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $data['status'], $data['admitted_at'], $id]);
    }    

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function emailExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
