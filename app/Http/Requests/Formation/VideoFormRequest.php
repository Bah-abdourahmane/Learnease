<?php

namespace App\Http\Requests\Formation;

use Illuminate\Foundation\Http\FormRequest;

class VideoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'string', 'max:255'],
            "url" => ['required', 'mimetypes:video/*', 'max:50000'],
            "chapter_id" => ['required'],
            "description" => ['required', 'min:30'],
            "duration" => ['required', 'string'],
        ];
    }
}
