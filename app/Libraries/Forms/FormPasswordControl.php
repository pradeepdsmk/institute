<?php

namespace App\Libraries\Forms;

class FormPasswordControl extends FormControl
{
    public function setValueFromRequest()
    {
        throw new \Exception('Not implemented');
    }

    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <input id="$id" class="form-control" type="password" name="$this->name" value="$value" />                
            </div>
HEREDOC;
    }
}
