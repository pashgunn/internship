<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class TagRequest extends FormRequest
{
    public function getTags(): Collection
    {
        $tagsInput = $this->input('tags');

        if (empty($tagsInput)) {
            return collect();
        }

        return collect(explode(",", $tagsInput))
            ->map(function ($tagName) {
                return trim($tagName);
            })
            ->filter(function ($tagName) {
                return $tagName !== '';
            })
            ->unique();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
