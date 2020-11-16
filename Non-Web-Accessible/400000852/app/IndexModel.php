<?php
use Quwi\framework\Observable_Model;

class IndexModel extends Observable_Model
{
    use Quwi\framework\Insert_Trait;

    //private $recordData = [];

    public function getAll() : array{
        $data = $this->loadData(DATA_DIR . '/courses.json');
        //return $data;
        $popularColumn = array_column($data['courses'], 3);
        $recommendedColumn = array_column($data['courses'], 2);
        $extra = $data['courses'];

        array_multisort($recommendedColumn, SORT_DESC, $data['courses']);
        $recommended = array_slice($data['courses'], 0, 8);
        array_multisort($popularColumn, SORT_DESC, $extra);
        $popular = array_slice($extra, 0, 8);

        $instructors = $this->loadData(DATA_DIR . '/instructors.json');

        return ['popular'=>$popular, 'recommended'=>$recommended, 'instructors'=>$instructors['instructors']];
        //return $data;
    }

    public function getRecord(string $id) : array{
        return [];
    }

    public function findAll()
    {
        $data = [];
        $query = "SELECT * from instructors";
        $courseQuery = "SELECT * from courses";
        $result = $this->sql->query($query);
        $courseResult = $this->sql->query($courseQuery);
        if ($this->sql->errno) {
            echo 'SQL Error occurred: ';
            echo $this->sql->error;
            exit();
        }
        $instructors = mysqli_fetch_all($result);
        $data = mysqli_fetch_all($courseResult);
        $popularColumn = array_column($data, 3);
        $recommendedColumn = array_column($data, 2);
        $extra = $data;

        array_multisort($recommendedColumn, SORT_DESC, $data);
        $recommended = array_slice($data, 0, 8);
        array_multisort($popularColumn, SORT_DESC, $extra);
        $popular = array_slice($extra, 0, 8);
        //array_push($this->json, $result->fetch_assoc());
        return ['popular'=>$popular, 'recommended'=>$recommended, 'instructors'=>$instructors];
       //return $data; */
    }

    public function findRecord($id)
    {
        
    }

    public function insert(array $values)
    {

    }
}