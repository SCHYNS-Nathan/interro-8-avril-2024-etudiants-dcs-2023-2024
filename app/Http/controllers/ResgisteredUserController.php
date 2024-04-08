<?php

namespace App\Http\controllers;

use App\Models\User;
use Core\Exceptions\FileNotFoundException;
use Core\Response;
use Core\Validator;
use JetBrains\PhpStorm\NoReturn;

class ResgisteredUserController
{
    private User $user;

    public function __construct()
    {
        try {
            $this->user = new User(base_path('.env.local.ini'));
        } catch (FileNotFoundException $exception) {
            die($exception->getMessage());
        }
    }
    public function create()
    {
        view('auth.register');
    }

    #[NoReturn] public function store(): void
    {
        $data = Validator::check([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        $data['password'] = password_hash($data['password'], 0);

        if ($this->user->create('users', $data)) {
            $_SESSION['user'] = $data['name'];
            $_SESSION['email'] = $data['email'];

            Response::redirect('/jiris');
        } else {
            Response::abort(Response::SERVER_ERROR);
        }
    }
}