<?php

namespace App\Http\Requests\Formation;

use Illuminate\Foundation\Http\FormRequest;

    class CourseFormRequest extends FormRequest
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
        // dd('lkkl');
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:30'],
            'cover_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],  // Taille maximale de 2 Mo pour l'image
            'domains_id' => ['required'],
            'level' => ['required', 'string'],
            // 'level' => ['required', 'in:beginner,intermediate,advanced'],
        ];
    }
}
