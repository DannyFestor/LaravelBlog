<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Created with
// $ php artisan make:request StoreBlogPost

class StoreBlogPost extends FormRequest
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
        $rules = [
            'description' => 'required'
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['title' => 'required|max:255|unique:posts'];
        } elseif ($this->getMethod() == 'PUT') {
            $rules += ['title' => 'required|max:255|unique:posts,title,'.$this->post['id']];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute ist benötigt',
            'unique'   => ':attribute muss einzigartig sein'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Ein Titel',
            'description' => 'Ein Text'
        ];
    }
}
