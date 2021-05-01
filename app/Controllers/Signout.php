<?php

namespace App\Controllers;

class Signout extends BaseController
{
    public function index()
    {
        unset($_SESSION['uit']);
        return redirect()->to('/');
    }
}
