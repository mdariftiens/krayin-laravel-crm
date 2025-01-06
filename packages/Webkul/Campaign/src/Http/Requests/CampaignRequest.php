<?php

namespace Webkul\Campaign\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'type' => ['required'],
            'description' => ['nullable'],
            'message' => ['required'],
            'status' => ['required'],
            'start_date' => ['required', 'date', 'after:yesterday'],
            'end_date' => ['required', 'date', 'after:yesterday'],
            'package_id' => ['required', 'integer'],
            'budget' => ['required', 'integer'],
        ];
    }
}
