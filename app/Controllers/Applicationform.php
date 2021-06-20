<?php

namespace App\Controllers;

use App\Libraries\Forms\F;

class Applicationform extends BaseController
{
    private $form = null;

    public function __construct()
    {
        $this->form = F::form('Application Form', [
            'id' => F::hidden(),
            'studentPhoto' => F::imageUpload('Photo'),
            'applicationNumber' => F::text('Application Number'),
            'registrationNumber' => F::text('Registration Number'),
            'branch' => F::text('Branch'),
            'studentName' => F::text('Student Name'),
            'fatherOrHusbandName' => F::text('Father\'s/Husband\'s Name'),
            'permanentAddress' => F::textarea('Permanent Address'),
            'communicationAddress' => F::textarea('Address for Communication'),
            'sex' => F::radioGroup('Sex', [
                F::radio('Male', 'm'),
                F::radio('Female', 'f')
            ]),
            'dateOfBirth' => F::date('Date of Birth'),
            'educationQualification' => F::text('Education Qualification'),
            'technicalQualification' => F::text('Technical Qualification'),
            'courseJoined' => F::text('Course Joined'),
            'collegeOrSchoolName' => F::text('College / School Name'),
            'referenceFrom' => F::radioGroup('Reference From', [
                F::radio('Friend', 'friend', [
                    'referenceFromText' => F::text('')
                ]),
                F::radio('TV Ad', 'tv-ad'),
                F::radio('Demo', 'demo')
            ]),
            'contactNumber' => F::number('Contact No.'),
            'emailId' => F::email('E-Mail ID'),
            'facebook' => F::text('Facebook'),
            'applicationDate' => F::date('Application Date'),
            'courseFee' => F::number('Course Fee'),
            'initialPayment' => F::number('Initial Payment')
        ]);
    }

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'GET') {
            $this->form->fromData([]);
            return view('application-form/application-form-dynamic', ['form' => $this->form]);
        } else if ($method == 'POST') {
            log_message('debug', 'applicationform::index $_POST ' . print_r($_POST, true));
            log_message('debug', 'applicationform::index $_FILES ' . print_r($_FILES, true));
            $this->form->fromRequest();
            if ($this->form->isValid()) {
                // $this->db->update('application', $this->form->data());
                // $this->form->reset();
                $alert = 'Saved';
            } else {
                $alert = 'Errors detected';
            }
            return view('application-form/application-form-dynamic', ['form' => $this->form, 'alert' => $alert]);
        } else {
            return redirect()->to('/applicationform');
        }
    }
}
