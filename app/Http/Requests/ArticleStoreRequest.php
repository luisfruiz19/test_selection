<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'title' => 'required|string|max:150',
            'description' => 'string',
            'state' => Rule::in([Article::STATE_ACTIVE, Article::STATE_INACTIVE]),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'El campo autor es requerido',
            'title.required' => 'El campo titulo es requerido',
            'description.string' => 'El campo descripcion no debe estar vacío',
            'state.in' => 'El campo estado no es un valor válido',
        ];
    }

}
