<?php

namespace App\Libraries\Forms;

class FormRadioButtonControl extends FormControl
{
    public $checked = false;

    public function setValueFromRequest()
    {
        $this->setValue($_POST);
    }

    public $childControl;

    public function __construct($label, $value, $childControl = [])
    {
        parent::__construct($label, $value);
        $this->childControl = $childControl;

        $this->value = $value;

        if (!empty($childControl)) {
            foreach ($childControl as $name => $control) {
                $control->setName($name);
            }
        }
    }

    public function setValue($data)
    {
        $this->checked = (!empty($data[$this->name])) && ($data[$this->name] === $this->value);

        if (!empty($this->childControl)) {
            foreach ($this->childControl as $name => $control) {
                if (isset($data[$name])) {
                    $control->setValue($data);
                } else {
                    log_message('debug', "$name not found in initialization data");
                }
            }
        }
    }

    public function getFields(&$fields)
    {
        if (!in_array($this->name, $fields)) {
            $fields[] = $this->name;
        }
        if (!empty($this->childControl)) {
            foreach ($this->childControl as $name => $control) {
                $control->getFields($fields);
            }
        }
    }

    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);

        $childControlText = '';

        if (!empty($this->childControl)) {
            foreach ($this->childControl as $name => $control) {
                $childControlText .= <<<HEREDOC
                <input class="form-control" type="text" name="$name" value="$control->value" />
HEREDOC;
            }
        }

        $checked = $this->checked ? 'checked' : '';

        return <<<HEREDOC

                <div class="form-check">
                    <input id="$id" class="form-check-input" type="radio" name="$this->name"  value="$value" $checked />
                    <label for="$id" class="form-check-label" >$this->label</label>
                    $childControlText
                </div>
HEREDOC;
    }

    public function data(&$data)
    {
        if ($this->checked) {
            $data[$this->name] = $this->value;
            if (!empty($this->childControl)) {
                foreach ($this->childControl as $name => $control) {
                    $control->data($data);
                }
            }
        }
    }
}
