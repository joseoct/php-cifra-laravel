<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data){
        $data['password'] = Hash::make($data['password']);
        $resource = $this->model->create($data);
        return $resource;
    }

    public function attempt(array $data){
        if (Auth::attempt($data)) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        return Auth::logout();
    }
}