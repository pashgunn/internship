<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class TagPostRequest extends FormRequest
{
    public function getTags(): Collection
    {
        return collect(explode(",", $this->input('tags')))->unique()->keyBy(function ($item) {
            return $item;
        })->forget(' ')->forget('');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tags' => 'string'
        ];
    }
}
