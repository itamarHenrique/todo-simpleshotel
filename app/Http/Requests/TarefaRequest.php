<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'nullable|in:pendente,concluida',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O titulo é obrigatorio',
            'titulo.max' => 'O titulo não pode exceder 255 caracteres',
            'status.in' => 'O status deve ser pendente ou concluida',
        ];
    }
}
