<?php

namespace App\Http\Requests\CommentRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'post_id' => ['required', 'numeric', 'exists:posts,id'],
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'parent_id' => ['nullable', 'numeric', 'exists:comments,id'],
            'body' => ['required', 'string']
        ];
    }
}
