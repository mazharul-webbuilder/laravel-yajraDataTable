<?php

namespace App\Traits;

Trait Authentication
{
    /**
     * Validate User Registration request
     * @param $request
     * @return mixed
     */
    public function registrationValidation($request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    /**
     * Validate User Registration request
     * @param $request
     * @return mixed
     */
    public function loginValidate($request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    }
}
