<?php

namespace Pyjac\Techphin\Http\Requests;

use Pyjac\Techphin\Http\Requests\Request;

class VideoUploadRequest extends Request
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
        return [
            'title' => 'required|max:255',
            'link' => 'required|max:255|regex:/^https:\/\/www\.youtube\.com\/watch\\?v=/|validYoutubeVideo',
            'description' => 'required|max:255',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
