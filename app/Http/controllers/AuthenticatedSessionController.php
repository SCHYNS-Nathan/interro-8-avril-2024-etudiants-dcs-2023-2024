<?php

namespace App\Http\controllers;

use App\Models\User;
use Core\Exceptions\FileNotFoundException;
use Core\Response;
use Core\Validator;
use JetBrains\PhpStorm\NoReturn;

class AuthenticatedSessionController
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
        view('auth.login');
    }

    #[NoReturn] public function store(): void
    {
        $data = Validator::check([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        if ($this->user->findUser($data['email'])) {
            $_SESSION['user'] = $data['name'];
            $_SESSION['email'] = $data['email'];

            Response::redirect('/jiris');
        } else {
            Response::abort(Response::SERVER_ERROR);
        }
    }

    public function destroy(): void
    {
        if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
            $_SESSION['user'] = null;
            $_SESSION['email'] = null;

            Response::redirect('/jiris');
        } else {
            Response::redirect('/jiris');
        }
    }
}