<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionFormRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        if ($this->method() == "POST" || $this->method() == "PUT") {
            $request = [
                'product_code' => 'required',
                'rules' => 'required'
            ];
        }

        return $request;
    }
}
