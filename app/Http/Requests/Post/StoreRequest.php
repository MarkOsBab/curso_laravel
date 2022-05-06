<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            /*
            Forma de implementación con un función sola, sin alternativas
            'slug' => Str::slug($this->title)
            */
            /* 
            Función alternativa, sirve para encadenar funciones de la clase Str
            'slug' => Str::of($this->title)->slug()->append()
            */
            /* 
            Funcion de helper a partir de Laravel 9 forma más corta y efectiva
            'slug' => str($this->title)->slug()
            */
            'slug' => Str($this->title)->slug()
        ]);
    }

    public static function myRules() {
        return [
            'title' => "required|min:5|max:255",
            'slug' => "required|min:5|max:255|unique:posts",
            'content' => "required|min:7",
            'category_id' => "required|integer",
            'description' => "required|min:7",
            'posted' => "required"
        ];
    }
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
        return $this->myRules();
    }
}
