<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    public function getPublishedAt()
    {
        return $this->input('isPublished') ? $this->input('published_at') : null;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->input('title')),
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
            'slug' => 'unique:articles,slug',
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'body' => 'required',
            'published_at' => 'nullable',
            'image' => 'required',
        ];
        if ($this->method() === 'PATCH') {
            $rules['slug'] = Rule::unique('articles', 'slug')->ignore($this->slug, 'slug');
        }
        return $rules;
    }


    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $fields = $validator->getData();
            $fields['published_at'] = $this->getPublishedAt();
            unset($fields['image']);
            $validator->setData($fields);
        });
    }
}
