<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PurchaseStoreFromPendingRequest extends FormRequest
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
            'price' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $price = $this->get('price');

        $this->merge([
            'price' => Str::replace(',', '.', $price),
	    'is_paid' => ($this->is_paid == 'true' || $this->is_paid ) ? 1 : 0,
        ]);

        if (! empty($this->get('price_of_installments'))) {
            $this->merge([
                'price_of_installments' => Str::replace(',', '.', $price),
            ]);
        }
    }
}
