<?php namespace GlobProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected $rules = [
        'project_id'    => 'required',
        'file'          => 'required|mimes:jpeg,jpg,png,git,pdf,zip,doc,docx',
        'name'          => 'required',
        'description'   => 'required'
    ];
}