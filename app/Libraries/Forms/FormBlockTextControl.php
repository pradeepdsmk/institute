<?php

namespace App\Libraries\Forms;

class FormBlockTextControl extends FormControl
{
    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <textarea id="$id" class="form-control" name="$this->name">$value</textarea>
            </div>
HEREDOC;
    }
}
