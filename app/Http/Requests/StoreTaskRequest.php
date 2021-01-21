<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'project' => 'required|integer',
            'assignee' => 'integer',
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|min:3',
            'type' => 'required|integer',
            'progress' => 'required|integer',
            'priority' => 'required|integer',
            'tags' => 'nullable',
            'est_duration' => 'nullable'
        ];
    }
}
