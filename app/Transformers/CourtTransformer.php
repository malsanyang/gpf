<?php

namespace App\Transformers;

use App\Models\Court;
use League\Fractal\TransformerAbstract;

class CourtTransformer extends TransformerAbstract
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
     * @param Court $court
     *
     * @return array
     */
    public function transform(Court $court)
    {
        return [
            'id'        => $court->id,
            'courtNo'   => $court->court_no,
            'name'      => $court->name,
            'location'  => $court->location,
        ];
    }
}
