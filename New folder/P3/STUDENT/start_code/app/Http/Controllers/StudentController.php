<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getStudents()
    {
        return Student::all();
    }
    public function getStudentsById($id)
    {
        $students = Student::all();
        foreach($students as $student){
            if ($student['id'] == $id){
                return $student['name'];
            }else{
                return "student not found !";
            }
        }
    }
   
}
