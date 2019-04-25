<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest as Request;

class NewsFormRequest extends Request
{
    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'body' => 'required',
        ];
    }
}