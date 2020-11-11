<?php
use Quwi\framework\Observable_Model;

class ProfileModel extends Observable_Model
{

    public function getAll() : array{
        $userCourses = $this->loadData(DATA_DIR . '/user_courses.json');
        $instructors = $this->loadData(DATA_DIR . '/instructors.json');
        return ['userCourses'=>$userCourses['courses'], 'instructors'=>$instructors['instructors']];
    }

    public function getRecord(string $id) : array{
        return [];
    }
}