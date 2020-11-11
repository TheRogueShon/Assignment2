<?php
use Quwi\framework\Observable_Model;

class SignupModel extends Observable_Model
{
    use Quwi\framework\Insert_Trait;

    public function getAll() : array{
        $users = $this->loadData(DATA_DIR . '/users.json');

        return $users;
    }

    public function getRecord(string $id) : array{
        return [];
    }

    public function insert(array $values)
    {
        $query = "INSERT INTO 'users' VALUES ('" . $values['name'] . "',
                                                 '{$values['email']}',
                                                 '{$values['password']}',
                                                 '')";
        $result = $this->sql->query($query);
        if ($this->sql->errno) {
            echo 'SQL Error occurred: ';
            echo $this->sql->error;
            exit();
        }

    }
}