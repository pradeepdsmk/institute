<?php

namespace App\Libraries\Forms;

include __DIR__ . '/FormControl.php';
include __DIR__ . '/FormSimpleTextControl.php';
include __DIR__ . '/FormDateControl.php';
include __DIR__ . '/FormEmailControl.php';
include __DIR__ . '/FormFileUploadControl.php';
include __DIR__ . '/FormImageUploadControl.php';
include __DIR__ . '/FormNumberControl.php';
include __DIR__ . '/FormPasswordControl.php';
include __DIR__ . '/FormHiddenControl.php';
include __DIR__ . '/FormRadioButtonControl.php';
include __DIR__ . '/FormRadioGroupControl.php';



class FormStudentApplication extends Form
{
    public function __construct($data = [])
    {
        $this->title = 'Application Form';

        $this->controls = [
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
        ];

        parent::__construct($data);
    }
}
