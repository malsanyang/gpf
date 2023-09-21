<?php

namespace App\Transformers;

use App\Models\Citizen;
use League\Fractal\TransformerAbstract;

class CitizenTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     * @param Citizen $citizen
     *
     * @return array
     */
    public function transform(Citizen $citizen): array
    {
        return [
            'id'            => $citizen->id,
            'name'          => $citizen->name,
            'ninNumber'     => $citizen->nin_number,
            'phoneNumber'   => $citizen->phone_number,
        ];
    }
}