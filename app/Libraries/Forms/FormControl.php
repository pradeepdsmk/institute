<?php

namespace App\Libraries\Forms;

class FormControl
{
    public $label;
    public $value;
    public $name;
    public $classes;
    public $request;

    public function __construct($label, $value = '')
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = '';
        $this->classes = [];
        $this->request = \Config\Services::request();
    }

    public function innerHTML()
    {
        return '';
    }

    public function randomId()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomString = '';
        for ($i = 0; $i < 14; $i++) {
            $randomString .= $characters[rand(0, 61)];
        }
        return $randomString;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setValue($data)
    {
        $this->value = $data[$this->name];
    }

    public function setValueFromRequest()
    {
        $this->value = htmlspecialchars($_POST[$this->name]);
    }

    public function getFields(&$fields)
    {
        $fields[] = $this->name;
    }
}
