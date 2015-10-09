<?php namespace GlobProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTasksValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'name' => 'required',
        'status' => 'required',
        'start_date' => 'required|date',
        'due_date' => 'required|date',
    ];
}