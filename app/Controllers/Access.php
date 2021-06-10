<?php


namespace App\Controllers;

class Access extends BaseController
{
    public function index()
    {        
        if($this->auth->isLoggedIn()) {
            return redirect()->to('/applicationform');
        }

        return view('access/signin-form');
        //return view('home/signin-form', ['signin_error' => '']);
    }


    public function signin()
    {
        if($this->auth->isLoggedIn()) {
            return redirect()->to('/applicationform');
        }
        
        $in_data = $this->request->getPost();
        if (!$in_data) {
            return view('access/signin-form', ['signin_error' => 'Incorrect username or password']);
        }

        $username = $in_data['username'] ?? '';
        $password = $in_data['password'] ?? '';

        if ($username && $password && $this->auth->signin($username, $password)) {
            return redirect()->to('/applicationform');
        } else {
            return view('access/signin-form', ['signin_error' => 'Incorrect username or password']);
        }
    }
}
