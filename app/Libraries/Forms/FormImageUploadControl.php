<?php

namespace App\Libraries\Forms;

class FormImageUploadControl extends FormFileUploadControl
{
    private $fromRequest = false;

    public function setValueFromRequest()
    {
        $this->fromRequest = true;

        $file = $this->request->getFile($this->name);

        if (!$file->isValid() || $file->hasMoved()) {
            $error = $file->getErrorString() . '(' . $file->getError() . ')';
            log_message('error', 'FormFileUploadControl::setValueFromRequest - ' . $error);
            return;
        }

        $mimeType = $file->getMimeType();
        if (!in_array($mimeType, ['image/jpeg', 'image/png'])) {
            $error = "invalid mime type [$mimeType]";
            log_message('error', 'FormFileUploadControl::setValueFromRequest - ' . $error);
            return;
        }

        $newName = $file->getRandomName();
        $uimg = 'uimg';
        $path = FCPATH . "$uimg/$newName";
        log_message('debug', 'FormFileUploadControl::setValueFromRequest file upload path is ' . $path);
        $file->move(FCPATH . $uimg, $newName);
        $this->value = "/$uimg/$newName";
    }

    public function innerHTML()
    {
        $id = $this->randomId();
        return <<<HEREDOC

            <div class="image-upload-control-wrap mb-3" data-component="ImageUploadComponent">
                <label>$this->label</label>
                <div class="image-upload-control">
                    <img class="image-preview" src="$this->value" />
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

    public function data(&$data)
    {
        if (!$this->fromRequest) {
            $data[$this->name] = $this->value;
            return;
        }

        if ($this->value != '') {
            $data[$this->name] = $this->value;
        }    
    }
}
