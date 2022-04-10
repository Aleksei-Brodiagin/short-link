<?php

namespace App\Http\Requests;

use App\DTO\LinkDTO;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LinkRedirectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['code' => "string[]"])]
    public function rules(): array
    {
        return [
            'code' => [
                'required'
            ],
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): LinkDTO
    {
        return new LinkDTO($this->all());
    }
}
