<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Send Mail Document Participant Form Request Fields",
 *      description="Send Mail Document Participant Form request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class DocumentParticipantSendMailFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *                   property="message",
     *                   type="string",
     *                   example="seatbelt holder"
     *               ),
     * @OA\Property(
     *      title="Title",
     *      description="Title",
     *      example="['file1','file2','file3']"
     * )
     *
     * @var string
     */
    public $files;

    /**
     *       @OA\Property(property="participants", type="object", type="array",
     *
     *            @OA\Items(
     *
     *                @OA\Property(
     *                   property="document_id",
     *                   type="string",
     *                   example="seatbelt holder"
     *               ),
     *                @OA\Property(
     *                   property="first_name",
     *                   type="string",
     *                   example="Ojo"
     *               ),
     *                @OA\Property(
     *                   property="last_name",
     *                   type="string",
     *                   example="Ojo"
     *               ),
     *                @OA\Property(
     *                   property="phone",
     *                   type="string",
     *                   example="07033839229"
     *               ),
     *                @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   example="ojo@finrs.com"
     *               ),
     *                @OA\Property(
     *                   property="role",
     *                   type="string",
     *                   example="Signer"
     *               ),
     *            ),
     *        ),
     *    ),
     */
    public $participants;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => 'nullable|string',
            'files' => 'nullable|array',
            'files.*' => 'nullable|base64file',
            'participants' => 'required|array',
            'participants.*.document_id' => 'required|string|exists:documents,id',
            'participants.*.first_name' => 'required|string',
            'participants.*.last_name' => 'required|string',
            'participants.*.email' => 'required|string',
            'participants.*.phone' => 'nullable|string',
            'participants.*.role' => 'required|string|in:Signer,Viewer',
        ];
    }
}
