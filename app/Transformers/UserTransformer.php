<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
     *
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id'            => $user->id,
            'firstName'     => $user->first_name,
            'lastName'      => $user->last_name,
            'fullName'      => $user->full_name,
            'address'       => $user->address,
            'telephoneNo'   => $user->telephone_no,
            'email'         => $user->email,
            'roleNames'     => $user->getRoleName(),
            'active'        => $user->active,
            'station'       => $user->station->name ?? '',
            'stationId'     => $user->station_id,
        ];
    }
}
