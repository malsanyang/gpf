<?php

namespace App\Transformers;

use App\Models\PoliceStation;
use League\Fractal\TransformerAbstract;

class PoliceStationTransformer extends TransformerAbstract
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
     * @param PoliceStation $station
     * @return array
     */
    public function transform(PoliceStation $station): array
    {
        return [
            'id'        => $station->id,
            'name'      => $station->name,
            'location'  => $station->location,
        ];
    }
}
