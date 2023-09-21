<?php

namespace App\Transformers;

use App\Models\Criminal;
use League\Fractal\TransformerAbstract;

class CriminalTransformer extends TransformerAbstract
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
     * @param Criminal $criminal
     *
     * @return array
     */
    public function transform(Criminal $criminal): array
    {
        return [
            'id'            => $criminal->id,
            'name'          => $criminal->name,
            'ninNumber'     => $criminal->nin_number,
            'phoneNumber'   => $criminal->phone_number,
        ];
    }
}
