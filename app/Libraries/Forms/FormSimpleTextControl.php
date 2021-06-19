<?php

namespace App\Libraries\Forms;

class FormSimpleTextControl extends FormControl
{
    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <input id="$id" class="form-control" type="text" name="$this->name" value="$value" />                
            </div>
HEREDOC;
    }
}
