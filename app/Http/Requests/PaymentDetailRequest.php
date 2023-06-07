<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentDetailRequest extends FormRequest
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
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'payment_method' => 'required|string|max:255',
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|string|max:30',
            'card_expiration' => 'required|string|max:6',
            'card_cvv' => 'required|string|max:4',
            'zip' => 'required|string|max:255',
        ];
    }
}
