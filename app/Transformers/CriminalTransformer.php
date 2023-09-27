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
            'firstName'     => $criminal->first_name,
            'lastName'      => $criminal->last_name,
            'fullName'      => $criminal->full_name,
            'address'       => $criminal->address,
            'telephoneNo'   => $criminal->telephone_no,
            'dob'           => $criminal->dob,
        ];
    }
}
