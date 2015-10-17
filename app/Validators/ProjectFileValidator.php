<?php namespace GlobProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected $rules = [
        'project_id'    => 'required|integer',
        'file'          => 'required',
        'name'          => 'required',
        'extension'     => 'required',
        'description'   => ''
    ];
}