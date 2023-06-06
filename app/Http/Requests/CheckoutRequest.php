<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'zip' => 'required|integer',
            'remember_detail' => 'nullable|boolean',
            'email' => 'nullable|email|max:255',
            'paymentMethod' => 'required|integer',
            'cardName' => 'required|string|max:255',
            'cardNumber' => 'required|string|max:30',
            'cardExpiration' => 'required|string|max:6',
            'cardCvv' => 'required|string|max:4',
        ];
    }
}
