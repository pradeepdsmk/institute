<?php

namespace App\Libraries;

class Auth
{


    /**
     *
     * @var \CodeIgniter\Database\MySQLi\Connection
     */
    private $db;



    private $session;

    private $user;

    public function __construct()
    {
        $this->db = \Config\Database::connect('default');
        $this->session = \Config\Services::session();

        $this->user = null;

        if (isset($_SESSION['uit'])) {
            $userid = $_SESSION['uit'];

            $row = $this->db->query('select username from users where userid = ?', [$userid])->getRow();

            if ($row && $row->username) {
                $this->user = $row;
            }
        }
    }

    public function isLoggedIn()
    {
        if ($this->user) {
            return true;
        }

        return false;
    }


    public function signin(string $username, string $password): bool
    {
        $row = $this->db->query('select userid, username, password from users where username = ?', [$username])->getRow();
        if (!$row || !$row->password) {
            $this->user = null;
            unset($_SESSION['uit']);
            return false;
        }
        if (password_verify($password, $row->password)) {
            unset($row->password);
            $this->user = $row;
            $_SESSION['uit'] = $row->userid;
            return true;
        }

        $this->user = null;
        unset($_SESSION['uit']);
        return false;
    }

    public function signout()
    {
        $this->user = null;
        unset($_SESSION['uit']);
    }
}
