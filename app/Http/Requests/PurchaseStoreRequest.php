<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PurchaseStoreRequest extends FormRequest
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
            'reference' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tags' => 'required',
            'is_paid' => 'required',
            'number_of_installments' => '',
            'price_of_installments' => '',
            'paid_by' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $price = $this->get('price');

        $this->merge([
            'price' => Str::replace(',', '.', $price)
        ]);

        if (! empty($this->get('price_of_installments'))) {
            $this->merge([
                'price_of_installments' => Str::replace(',', '.', $price)
            ]);
        }
    }
}