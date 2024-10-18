<?php
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $userModel;

    public function __construct($dbConfig)
    {
        $this->userModel = new User($dbConfig);
    }

    public function index()
    {
        $users = $this->userModel->readAll();
        echo json_encode($users);
    }

    public function store()
    {
        $data = $_POST;

        if ($this->userModel->emailExists($data['email'])) {
            echo json_encode(['request' => 'error', 'message' => 'E-mail já cadastrado!']);
            return;
        }

        if ($this->userModel->create($data)) {
            echo json_encode(['request' => 'success', 'message' => 'Usuário adicionado com sucesso!']);
        } else {
            echo json_encode(['request' => 'error', 'message' => 'Erro ao adicionar usuário.']);
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        echo json_encode($user);
    }

    public function update($id) {
        $data = $_POST;
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['request' => 'error', 'message' => 'E-mail inválido!']);
            return;
        }
    
        $existingUser = $this->userModel->findByEmail($data['email']);
        
        if ($existingUser && $existingUser['id'] != $id) {
            echo json_encode(['request' => 'error', 'message' => 'E-mail já cadastrado por outro usuário!']);
            return;
        }
    
        if ($this->userModel->update($id, $data)) {
            echo json_encode(['request' => 'success', 'message' => 'Usuário atualizado com sucesso!']);
        } else {
            echo json_encode(['request' => 'error', 'message' => 'Erro ao atualizar usuário.']);
        }
    }

    public function delete($id)
    {
        if ($this->userModel->delete($id)) {
            echo json_encode(['request' => 'success', 'message' => 'Usuário excluído com sucesso!']);
        } else {
            echo json_encode(['request' => 'error', 'message' => 'Erro ao excluir usuário.']);
        }
    }
}
