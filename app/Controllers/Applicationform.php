<?php

namespace App\Controllers;

use App\Libraries\Forms\F;

class Applicationform extends BaseController
{
    private $form = null;

    public function __construct()
    {
        $this->form = F::form('Application Form', [
            'studentid' => F::hidden(),
            'studentphoto' => F::imageUpload('Photo'),
            'applicationnumber' => F::text('Application Number'),
            'registrationnumber' => F::text('Registration Number'),
            'branch' => F::text('Branch'),
            'studentname' => F::text('Student Name'),
            'fatherorhusbandname' => F::text('Father\'s/Husband\'s Name'),
            'permanentaddress' => F::textarea('Permanent Address'),
            'communicationaddress' => F::textarea('Address for Communication'),
            'sex' => F::radioGroup('Sex', [
                F::radio('Male', 'm'),
                F::radio('Female', 'f')
            ]),
            'dateofbirth' => F::date('Date of Birth'),
            'educationqualification' => F::text('Education Qualification'),
            'technicalqualification' => F::text('Technical Qualification'),
            'coursejoined' => F::text('Course Joined'),
            'collegeorschoolname' => F::text('College / School Name'),
            'referencefrom' => F::radioGroup('Reference From', [
                F::radio('Friend', 'friend', [
                    'referencefromtext' => F::text('')
                ]),
                F::radio('TV Ad', 'tv-ad'),
                F::radio('Demo', 'demo')
            ]),
            'contactnumber' => F::number('Contact No.'),
            'emailid' => F::email('E-Mail ID'),
            'facebook' => F::text('Facebook'),
            'applicationdate' => F::date('Application Date'),
            'coursefee' => F::number('Course Fee'),
            'initialpayment' => F::number('Initial Payment')
        ]);
    }

    public function index()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                return $this->get();
            case 'POST':
                return $this->post();
            default:
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    private function get()
    {
        $id = $_GET['id'] ?? '';
        if (preg_match('#^[1-9][0-9]*$#', $id)) {
            $data = $this->db->query('select * from students where studentid = ? limit 1;', [$id])->getRowArray();
            if (empty($data)) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            $this->form->fromData($data);
        } else {
            $this->form->fromData([]);
        }
        return view('application-form/application-form-dynamic', ['form' => $this->form]);
    }

    private function post()
    {
        log_message('debug', 'applicationform::index $_POST ' . print_r($_POST, true));
        log_message('debug', 'applicationform::index $_FILES ' . print_r($_FILES, true));
        $this->form->fromRequest();

        if (!$this->form->isValid()) {
            $alert = 'Errors detected';
            return view('application-form/application-form-dynamic', ['form' => $this->form, 'alert' => $alert]);
        }
        $data = $this->form->data();
        $id = $data['studentid'];

        unset($data['studentid']);
        if ($id) {
            $this->db->table('students')->update($data, ['studentid' => $id]);
        } else {            
            $this->db->table('students')->insert($data);
            $id = $this->db->insertID();            
        }
        $data['studentid'] = $id;

        return redirect()->to("/applicationform?id=$id");
    }
}
