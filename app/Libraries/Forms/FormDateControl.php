<?php

namespace App\Libraries\Forms;

class FormDateControl extends FormControl
{
    public function setValueFromRequest()
    {
        if ($_POST[$this->name]) {
            $this->value = preg_replace('#[^0-9\-]#', '', $_POST[$this->name]);
        }
    }

    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <input id="$id" class="form-control" type="date" name="$this->name" value="$value" />                
            </div>
HEREDOC;
    }
}