<?php

namespace App\Transformers;

use App\Models\Prison;
use League\Fractal\TransformerAbstract;

class PrisonTransformer extends TransformerAbstract
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
     * @param Prison $prison
     *
     * @return array
     */
    public function transform(Prison $prison): array
    {
        return [
            'id'        => $prison->id,
            'prisonNo'  => $prison->prison_no,
            'name'      => $prison->name,
            'location'  => $prison->location,
        ];
    }
}
