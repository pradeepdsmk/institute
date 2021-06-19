<?php

namespace App\Libraries\Forms;

class FormRadioGroupControl extends FormControl
{
    public $controls;

    public function __construct($label, $controls)
    {
        parent::__construct($label);
        $this->controls = $controls;
    }

    public function setName($name)
    {
        $this->name = $name;
        foreach ($this->controls as $control) {
            $control->setName($name);
        }
    }

    public function setValue($data)
    {
        foreach ($this->controls as $control) {
            $control->setValue($data);
        }
    }

    public function setValueFromRequest()
    {
        foreach ($this->controls as $control) {
            $control->setValueFromRequest();
        }
    }

    public function getFields(&$fields)
    {
        $groupFields = [];
        foreach ($this->controls as $control) {
            $control->getFields($groupFields);
        }
        foreach ($groupFields as $field) {
            $fields[] = $field;
        }
    }

    public function innerHTML()
    {
        $controlsHTML = '';
        foreach ($this->controls as $control) {
            $controlsHTML .= $control->innerHTML();
        }

        return <<<HEREDOC
        
            <div class="mb-3">
                <label>$this->label</label>
                $controlsHTML
            </div>
HEREDOC;
    }
}