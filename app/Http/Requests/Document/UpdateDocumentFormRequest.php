<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Admin Update Document Form Request Fields",
 *      description="Admin Update Document Request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateDocumentFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title",
     *      example="Untitled"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title",
     *      example="['file1','file2','file3']"
     * )
     *
     * @var string
     */
    public $files;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'active' => 'nullable|boolean',
            'files' => 'nullable|array',
            'files.*' => 'nullable|base64file',
        ];
    }
}
