<?php

namespace App\Controllers;

class Setup extends BaseController
{
    public function index()
    {
        $row = $this->db->query('select count(userid) as numusers from users')->getRow();
        $numusers = intval($row->numusers);
        if ($numusers > 0) {
            return view('errors/html/error_404');
        }

        return view('setup/create-admin');
    }

    public function create_admin()
    {
        $row = $this->db->query('select count(userid) as numusers from users')->getRow();
        $numusers = intval($row->numusers);
        if ($numusers > 0) {
            return view('errors/html/error_404');
        }

        $in_data = $this->request->getPost();
        if (!$in_data) {
            return view('setup/create-admin', ['signin_error' => 'username or password not acceptable']);
        }

        $username = $in_data['username'] ?? '';
        $password = $in_data['password'] ?? '';

        if (!$username || !$password) {
            return view('setup/create-admin', ['signin_error' => 'username or password not acceptable']);
        }

        $this->db->query('insert into users (username, password) values (?, ?)', [$username, \password_hash($password, PASSWORD_BCRYPT)]);
        
        header('refresh:2;url=/access');
        return view('setup/create-admin', ['signin_error' => 'Admin account created, redirecting...']);

    }
}
