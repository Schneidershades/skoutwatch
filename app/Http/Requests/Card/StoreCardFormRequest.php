<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Pay with card Form Request Fields",
 *      description="Pay with card request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreCardFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="recurring_transaction_id",
     *      description="recurring_transaction_id",
     *      example="recurring_transaction_id"
     * )
     *
     * @var string
     */
    public $recurring_transaction_id;

    /**
     * @OA\Property(
     *      title="camount",
     *      description="amount",
     *      example="500"
     * )
     *
     * @var string
     */
    public $amount;

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
            'amount' => 'numeric|required|gt:500',
            'recurring_transaction_id' => 'required|string|exists:recurring_transactions,id',
        ];
    }
}
