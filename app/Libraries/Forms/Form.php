<?php

/*
namespace App\Libraries\Forms;

class FormControl
{

    public $label;
    public $value;
    public $name;

    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = '';
    }

    public function innerHTML()
    {
        return '';
    }

    public function randomId()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, 61)];
        }
        return $randomString . microtime();
    }
}

class FormFileUploadControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }

    public function innerHTML()
    {
        return '';
    }
}

class FormSimpleTextControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormBlockTextControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormEmailControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormPasswordControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormDateControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormRadioButtonControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormCheckboxControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormCheckboxWithTextControl extends FormControl
{
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class FormImageUploadControl extends FormFileUploadControl
{
    public $src;

    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
        $this->src = '/student-example.jpg';
    }

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
    public function __construct($label, $value = '')
    {
        parent::__construct($label, $value);
    }
}

class Form
{
    public function __construct($data)
    {
        $properties = get_object_vars($this);
        foreach ($properties as $name => $formControl) {
            if (is_array($formControl)) {
            } else {
                $formControl->name = $name;
                $formControl->value = $data[$name] ?? '';
            }
        }
    }

    // public function data() {
    //     $data = [];
    //     $properties = get_class_vars(get_class($this));
    //     foreach($properties as $name) {
    //         $property = $this->$name;
    //         $data[$name] = $property->value;
    //     }
    //     return $data;
    // }
}
*/