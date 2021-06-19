<?php

namespace App\Libraries\Forms;

// class FormCheckboxControl extends FormControl
// {
// }

// class FormCheckboxWithTextControl extends FormControl
// {
// }

// class FormSingleSelectControl extends FormControl
// {
// }

class Form
{
    public $title = 'Form';
    public $controls = [];

    public function __construct($data)
    {
        foreach ($this->controls as $name => $control) {
            $control->setName($name);
            if(isset($data[$name])) {
                $control->setValue($data);
            } else {
                log_message('debug', "$this->title : $name not found in initialization data");
            }            
        }
    }

    public function getFields(&$fields)
    {
        foreach ($this->controls as $name => $control) {
            $control->getFields($fields);
        }
    }

    public static function fromRequest()
    {
        $classname = get_called_class();
        log_message('debug', 'Form2::fromRequest called class ' . $classname);
        $obj = new $classname();
        foreach ($obj->controls as $name => $control) {
            $control->setValueFromRequest();
        }

        return $obj;
    }

    public function isValid(): bool
    {
        return false;
    }
}


