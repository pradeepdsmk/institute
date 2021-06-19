<?php

namespace App\Libraries\Forms;

class FormHiddenControl extends FormControl
{
    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC
            <input id="$id" class="form-control" type="hidden" name="$this->name" value="$value" />  
HEREDOC;
    }
}