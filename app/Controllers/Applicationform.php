<?php

namespace App\Controllers;

use App\Libraries\Forms\FormStudentApplication2;

class Applicationform extends BaseController
{
    private $form;

    public function __construct()
    {
        $this->form = new FormStudentApplication2([]);
    }

    public function index()
    {
        return view('application-form/application-form-dynamic', ['form' => $this->form]);
    }

    public function submit()
    {
        log_message('debug', print_r($_POST, true));
        log_message('debug', print_r($_FILES, true));

        $alert = 'Saved. Redirecting...';
        // header('Refresh:30 url=' . '/applicationform');
        return view('application-form/application-form-dynamic', ['form' => $this->form, 'alert' => $alert]);
    }
}
