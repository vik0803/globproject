<?php namespace GlobProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'responsible' => 'required|max:255',
    ];
}