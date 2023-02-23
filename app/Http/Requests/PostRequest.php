<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     
    
    public function messages()
    {
      return [
        'img.required' => '投稿する画像を選択してください',
        'post.zoo_id.required' => 'タグ付けする動物園を選択してください',
        'post.animal_family_id.required' => 'タグ付けする動物を選択してください',
      ];
    }

    public function rules()
    {
        return [
            'img' => 'required|image',
            'post.zoo_id' => 'required',
            'post.animal_family_id' => 'required',
        ];
    }
}
