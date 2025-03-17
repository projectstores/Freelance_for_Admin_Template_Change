<?php

namespace App\Http\Requests\Main\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Get max skills
        $max_skills = settings('projects')->max_skills;

        return [
            'title'       => 'required|max:100',
            'description' => 'required',
            'category'    => 'required|exists:projects_categories,id',
            'skills'      => ['required', 'array', "max:$max_skills"],
            'skills.*'    => [ Rule::exists('projects_skills', 'id')->where(function($query) {
                return $query->where('category_id', $this->request->get('category'));
            }) ],
            'salary_type' => 'required|in:hourly,fixed',
            'price_min'   => ['required', 'regex:/^([1-9][0-9]*|0)(\.[0-9]{1,2})?$/'],
            'price_max'   => ['required', 'regex:/^([1-9][0-9]*|0)(\.[0-9]{1,2})?$/']
        ];
    }


    /**
     * Set validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => __('messages.t_validator_required'),
        ];
    }
}
