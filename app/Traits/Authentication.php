<?php

namespace App\Traits;

Trait Authentication
{
    public function registrationValidation($request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }
}
