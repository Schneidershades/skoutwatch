<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Player Create Form Request Fields",
 *      description="Player Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class StorePlayerAttributeFormRequest extends FormRequest
{

    /**
     * @OA\Property(
     *      title="first_name",
     *      description="first_name",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="last_name",
     *      description="last_name",
     *      example="Komolafe"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="nin",
     *      description="nin",
     *      example="13904949033"
     * )
     *
     * @var string
     */
    public $nin;

    /**
     * @OA\Property(
     *      title="email",
     *      description="email",
     *      example="schneidershades@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     *       @OA\Property(property="attributes", type="object", type="array",
     *            @OA\Items(
     *                @OA\Property(
     *                   property="attribute",
     *                   type="string",
     *                   example="Dribbling"
     *               ),
     *                @OA\Property(
     *                   property="score",
     *                   type="int",
     *                   example="50"
     *               ),
     *            ),
     *        ),
     *    ),
     */
    public $attributes;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'nin' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'attributes' => 'required|array',
            'attributes.attribute.*' => 'required|string',
            'attributes.score.*' => 'required|integer',
        ];
    }
}
