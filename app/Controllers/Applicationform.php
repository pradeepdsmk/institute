<?php

namespace App\Controllers;

use App\Libraries\Forms\FormStudentApplication;

class Applicationform extends BaseController
{
    private $form = null;

    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'GET') {
            $this->form = new FormStudentApplication();
            return view('application-form/application-form-dynamic', ['form' => $this->form]);
        } else if ($method == 'POST') {
            log_message('debug', 'applicationform::index $_POST ' . print_r($_POST, true));
            log_message('debug', 'applicationform::index $_FILES ' . print_r($_FILES, true));
            $this->form = FormStudentApplication::fromRequest();
            if ($this->form->isValid()) {
                $this->db->update('application', $this->form->data());
                $this->form->reset();
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
