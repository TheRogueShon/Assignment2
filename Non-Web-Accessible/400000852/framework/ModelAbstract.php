<?php
namespace Quwi\framework;
abstract class ModelAbstract
{
    protected $json = [];
    protected $sql = null;

    abstract public function getAll() : array;

    abstract public function getRecord(string $id) : array;

    public function loadData($file) : array 
    {
        $fileName = basename($file, '.json');
        if(!isset($this->json[$fileName]) || empty($this->json[$fileName])){
            $jsonFile = file_get_contents($file);
            $this->json[$fileName] = json_decode($jsonFile, true);
        }
        return $this->json[$fileName];
    }

    public function storeData($data)
    {
        $jsonData = json_encode($data);
        file_put_contents(DATA_DIR . '/users.json', $jsonData);
    }

    public static function makeConnection()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $name = 'mooc';

        //establish database connection here
        $sql = mysqli_connect($host, $user, $pass, $name);
        if(!$sql){
            die('Cannot connect to database');
        }
        else {
            return $sql;
        }
    }
}