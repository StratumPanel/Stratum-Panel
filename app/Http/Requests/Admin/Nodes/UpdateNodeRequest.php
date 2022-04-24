<?php

namespace App\Http\Requests\Admin\Nodes;

use App\Rules\Network\Domain;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'cluster' => ['required', 'string', 'min:1', 'max:50'],
            'hostname' => ['required', new Domain],
            'port' => ['required', 'numeric'],
            'username' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
        ];
    }
}
