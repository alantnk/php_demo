<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {
        // Validate the form inputs

        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        if (! empty($this->errors)) {
            return view('session/create.view.php', [
                'errors' => $this->errors
            ]);
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
