<?php

namespace App\Libraries\Forms;

class FormEmailControl extends FormControl
{
    public function setValueFromRequest()
    {
        if ($_POST[$this->name]) {
            $this->value = filter_var($_POST[$this->name], FILTER_SANITIZE_EMAIL);
        }
    }

    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <input id="$id" class="form-control" type="email" name="$this->name" value="$value" />                
            </div>
HEREDOC;
    }
}
