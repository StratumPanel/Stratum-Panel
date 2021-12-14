<?php

namespace App\Http\Requests\Client\Servers\Settings;

use App\Rules\Network\Hostname;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNetworkConfigRequest extends FormRequest
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
            'hostname' => ['required', new Hostname, 'ipv4'],
            'nameserver_1' => ['string', 'nullable'],
            'nameserver_2' => ['string', 'nullable'],
        ];
    }
}
