<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules()
    {
       
       

            return [
				  'taskdescription'=>['required', 'string'],
                  'completion_date'=>['required', 'string'],
			]
            +
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }
           
    protected function store()
    {
            return [
             
                'taskname'=>['required', 'string'],
               
            ];
     }
           
    protected function update()
    {
        $taskId = $this->route('student');
            return [
                'taskname' => ['required', 'string', Rule::unique('tasks', 'taskname')->ignore($taskId),
                ]
                
            ];
        
    } 
}
