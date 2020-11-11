<?php
use Quwi\framework\Observable_Model;

class LoginModel extends Observable_Model
{

    public function getAll() : array{
        /*
        $users = $this->loadData(DATA_DIR . '/users.json');
        return $users;
        */
        $users = "SELECT * FROM `users`";
        return [];
    }

    public function getRecord(string $id) : array{
        return [];
    }
}