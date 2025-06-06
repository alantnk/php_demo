<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query(
                'select * from users where email = :email',
                ['email' => $email]
            )->find();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        Session::put('user', [
            'email' => $user['email'],
            'id' => $user['id']
        ]);

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
