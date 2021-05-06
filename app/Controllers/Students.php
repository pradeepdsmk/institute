<?php

namespace App\Controllers;

class Students extends BaseController
{
    public function index()
    {
        $students = $this->db->query(
            'select s.name, s.course, s.joinedon, s.coursefee, count(fp. 
            from students s 
            left join feepayments fp on s.studentid = fp.studentid 
            order by s.joinedon 
            limit 0, 25;')->getResult();
        return view('students/students-list');
    }
}
