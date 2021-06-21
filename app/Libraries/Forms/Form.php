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

    public function __construct($label, &$controls)
    {
        $this->label = $label;
        $this->controls = $controls;
        foreach ($this->controls as $name => $control) {
            $control->setName($name);            
        }
    }

    public function getFields(&$fields)
    {
        foreach ($this->controls as $name => $control) {
            $control->getFields($fields);
        }
    }

    public function fromData($data)
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

    public function fromRequest()
    {
        foreach($this->controls as $name => $control) {
            $control->setValueFromRequest();
        }
    }

    public function isValid(): bool
    {
        log_message('alert', 'Form::isValid not implemented');
        return true;
    }

    public function data() {
        $data = [];
        foreach($this->controls as $name => $control) {
            $control->data($data);
        }
        return $data;
    }
}


