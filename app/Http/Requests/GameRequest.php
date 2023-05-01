<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gamerequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'game.name' => 'required|string|max:100',
            'game.overview' => 'required|string|max:5000',
        ];
    }
}
