<?php

namespace App\Http\Requests\Admin\Wallets;

use Illuminate\Foundation\Http\FormRequest;

class CreateWalletRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'short_name' => 'required|min:2|max:10',
            'address' => 'required|min:20|max:200'
        ];
    }
}
