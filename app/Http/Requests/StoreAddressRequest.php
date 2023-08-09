<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'city' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'size:2'],
            'zip_code' => ['required', 'unique:addresses', 'string', 'size:8' ],
        ];
    }

}
