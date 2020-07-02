<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->getMethod() == 'PUT' || $this->getMethod() == 'DELETE') {
            return $this->user()->can('update-comment', $this->comment);
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

        return [
            'title' => 'required|max:255',
            'description' => 'required'
        ];
    }
}
