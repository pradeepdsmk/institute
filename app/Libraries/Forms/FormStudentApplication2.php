<?php

namespace App\Libraries\Forms;

class FormStudentApplication2 extends Form2
{
    public function __construct($data = [])
    {
        $this->title = 'Application Form';

        $this->controls = [
            'studentPhoto' => F::imageUpload('Photo'),
            'applicationNumber' => F::text('Application Number'),
            'registrationNumber' => F::text('Registration Number'),
            'branch' => F::text('Branch'),
            'studentName' => F::text('Student Name'),
            'fatherOrHusbandName' => F::text('Father\'s/Husband\'s Name'),
            'permanentAddress' => F::textarea('Permanent Address'),
            'communicationAddress' => F::textarea('Address for Communication'),
            'sex' => F::radioGroup('Sex', [F::radio('Male', 'm'), F::radio('Female', 'f')]),
            'dateOfBirth' => F::date('Date of Birth'),
            'educationQualification' => F::text('Education Qualification'),
            'technicalQualification' => F::text('Technical Qualification'),
            'courseJoined' => F::text('Course Joined'),
            'collegeOrSchoolName' => F::text('College / School Name'),
            'referenceFrom' => F::radioGroup('Reference From', [F::radio('Friend', 'friend', ['referenceFromText' => F::text('')]), F::radio('TV Ad', 'tv-ad'), F::radio('Demo', 'demo')]),
            'contactNumber' => F::number('Contact No.'),
            'emailId' => F::email('E-Mail ID'),
            'facebook' => F::text('Facebook'),
            'applicationDate' => F::date('Application Date'),
            'courseFee' => F::number('Course Fee'),
            'initialPayment' => F::number('Initial Payment')
        ];

        $data['applicationDate'] = date('Y-m-d');

        parent::__construct($data);
    }
}

class SigninForm extends Form2
{
    public function __construct($data = [])
    {
        $this->title = 'Signin';

        $this->controls = [
            'username' => F::text('Username'),
            'password' => new FormPasswordControl('Password')
        ];

        parent::__construct($data);
    }
}
