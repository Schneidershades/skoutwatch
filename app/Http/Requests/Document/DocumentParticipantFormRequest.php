<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Document Participant Form Request Fields",
 *      description="Store Document Participant request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class DocumentParticipantFormRequest extends FormRequest
{
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
     *                @OA\Property(
     *                   property="entry_point",
     *                   type="string",
     *                   example="Video,Notary"
     *               ),
     *                @OA\Property(
     *                   property="message",
     *                   type="boolean",
     *                   example="false"
     *               ),
     *            ),
     *        ),
     *    ),
     */

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
        return [
            'participants' => 'required|array',
            'participants.*.document_id' => 'required|string|exists:documents,id',
            'participants.*.first_name' => 'required|string',
            'participants.*.last_name' => 'required|string',
            'participants.*.email' => 'required|string',
            'participants.*.phone' => 'nullable|string',
            'participants.*.entry_point' => 'nullable|in:Docs,Video,Notary',
            'participants.*.role' => 'required|string|in:Signer,Viewer',
            'participants.*.message' => 'nullable|boolean',
        ];
    }
}
