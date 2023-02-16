<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticlePostRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->request->get('title')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|unique:articles,title|min:5|max:100',
            'description' => 'required|max:255',
            'body' => 'required',
        ];

        if ($this->method() === 'POST') {
            $rules['slug'] = 'unique:articles,slug';
        }

        return $rules;
    }
}
