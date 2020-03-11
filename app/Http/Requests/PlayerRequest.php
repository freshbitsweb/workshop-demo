<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


class PlayerRequest extends FormRequest
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
        if (Route::currentRouteName() == 'store') {
            return [
                'name' => 'required|string',
                'batting_average' => 'required|numeric',
                'bowling_average' => 'required|numeric',
                'playing' => 'required|string',
                'avatar' => 'required|image',
            ];
        }

        if (Route::currentRouteName() == 'update') {
            return [
                'name' => 'required|string',
                'batting_average' => 'required|numeric',
                'bowling_average' => 'required|numeric',
                'playing' => 'required|string',
            ];
        }
    }
}