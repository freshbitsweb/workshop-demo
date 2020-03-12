<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


class SavePlayerRequest extends FormRequest
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
        $avatarRule = Route::currentRouteName() === 'update' ? 'nullable' : 'required';

        return [
            'name' => 'required|string|max:255',
            'batting_average' => 'required|numeric',
            'bowling_average' => 'required|numeric',
            'playing' => 'required|boolean',
            'avatar' => $avatarRule.'|image',
        ];
    }
}
