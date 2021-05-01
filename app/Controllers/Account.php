<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index()
    {
        return view('account/account-settings');
    }

    public function signout() {
        $this->auth->signout();
        return redirect()->to('/access');
    }
}
