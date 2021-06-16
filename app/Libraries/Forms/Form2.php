<?php

namespace App\Libraries\Forms;

class FormControl
{

    public $label;
    public $value;
    public $name;
    public $classes;

    public function __construct($label, $value = '')
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = '';
        $this->classes = [];
    }

    public function innerHTML()
    {
        return '';
    }

    public function randomId()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomString = '';
        for ($i = 0; $i < 14; $i++) {
            $randomString .= $characters[rand(0, 61)];
        }
        return $randomString;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setValue($data)
    {
        $this->value = $data[$this->name];
    }
}

class FormFileUploadControl extends FormControl
{
    public function innerHTML()
    {
        return '';
    }
}

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

class FormEmailControl extends FormControl
{
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

class FormPasswordControl extends FormControl
{
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

class FormNumberControl extends FormControl
{
    public function innerHTML()
    {
        $id = $this->randomId();
        $value = htmlspecialchars($this->value);
        return <<<HEREDOC

            <div class="mb-3">
                <label for="$id">$this->label</label>
                <input id="$id" class="form-control" type="number" name="$this->name" value="$value" />                
            </div>
HEREDOC;
    }
}

class FormDateControl extends FormControl
{
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

class FormRadioButtonControl extends FormControl
{
    public $childControl;

    public function __construct($label, $value, $childControl = [])
    {
        parent::__construct($label, $value);
        $this->childControl = $childControl;

        if (!empty($childControl)) {
            foreach ($childControl as $name => $control) {
                $control->setName($name);
            }
        }
    }

    public function setValue($data)
    {
        $this->value = $data[$this->name];

        if (!empty($childControl)) {
            foreach ($this->childControl as $name => $control) {
                $control->setValue($data);
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

        return <<<HEREDOC

                <div class="form-check">
                    <input id="$id" class="form-check-input" type="radio" name="$this->name"  value="$value" />
                    <label for="$id" class="form-check-label" >$this->label</label>
                    $childControlText
                </div>
HEREDOC;
    }
}

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

class FormCheckboxControl extends FormControl
{
}

class FormCheckboxWithTextControl extends FormControl
{
}

class FormImageUploadControl extends FormFileUploadControl
{
    // public $src = '/student-example.jpg';
    public $src = '';

    public function innerHTML()
    {
        $id = $this->randomId();
        return <<<HEREDOC

            <div class="image-upload-control-wrap mb-3" data-component="ImageUploadComponent">
                <label>$this->label</label>
                <div class="image-upload-control">
                    <img class="image-preview" src="$this->src" />
                    <div class="btn btn-light edit-image-button" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        <input type="file" id="$id" class="file-input" name="$this->name" accept="image/png, image/jpeg" />
                    </div>
                </div>
            </div>            
HEREDOC;
    }
}

class FormSingleSelectControl extends FormControl
{
}

class Form2
{
    public $title = 'Form';
    public $controls = [];

    public function __construct($data)
    {
        foreach ($this->controls as $name => $control) {
            $control->setName($name);
            if (isset($data[$name])) {
                $control->setValue($data);
            } else {
                log_message('debug', "$this->title : $name not found in initialization data");
            }
        }
    }
}

class F
{
    public static function text($label)
    {
        return new FormSimpleTextControl($label);
    }

    public static function textarea($label)
    {
        return new FormBlockTextControl($label);
    }

    public static function email($label)
    {
        return new FormEmailControl($label);
    }

    public static function password($label)
    {
        return new FormPasswordControl($label);
    }

    public static function number($label)
    {
        return new FormNumberControl($label);
    }

    public static function date($label)
    {
        return new FormDateControl($label);
    }

    public static function imageUpload($label)
    {
        return new FormImageUploadControl($label);
    }

    public static function radio($label, $value, $asText = false)
    {
        return new FormRadioButtonControl($label, $value, $asText);
    }

    public static function radioGroup($label, $controls)
    {
        return new FormRadioGroupControl($label, $controls);
    }
}
