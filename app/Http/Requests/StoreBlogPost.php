<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

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
        $post = $this->route('post');
        // dd($post, $this->user(), $this->user()->can('update-post', $post));
        // return true;
        if ($this->getMethod() == 'PUT' || $this->getMethod() == 'DELETE') {
            return $this->user()->can('update-post', $post);
        } elseif ($this->getMethod() == 'POST') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->getMethod() == 'DELETE') {
            return [];
        }

        $rules = [];

        if ($this->getMethod() == 'POST') {
            $rules += ['title' => 'required|max:255|unique:posts'];
        } elseif ($this->getMethod() == 'PUT') {
            $rules += ['title' => 'required|max:255|unique:posts,title,'.$this->post['id']];
        }

        $rules += [
            'description' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Please put in a :attribute',
            'unique'   => ':attribute must be unique'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'description' => 'Description'
        ];
    }
}
