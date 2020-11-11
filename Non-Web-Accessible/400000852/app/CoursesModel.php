<?php
use Quwi\framework\Observable_Model;

class CoursesModel extends Observable_Model
{
    private $courses = [];

    public function getAll() : array{
        $courses = $this->loadData(DATA_DIR . '/courses.json');
        $instructors = $this->loadData(DATA_DIR . '/instructors.json');
        $faculty = $this->loadData(DATA_DIR . '/faculty_department.json');
        $facultyCourses = $this->loadData(DATA_DIR . '/faculty_dept_courses.json');
        return ['courses'=>$courses['courses'], 'instructors'=>$instructors['instructors'], 'faculty'=>$faculty['faculty_department'],
                'facultyCourses'=>$facultyCourses['faculty_dept_courses']];
    }

    public function getRecord(string $id) : array{
        return [];
    }
}