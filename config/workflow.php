<?php

use App\Models\Crime;

return [
    'crime_workflow' => [
        'type' => 'state_machine',
        'marking_store' => [
            'type'      => 'single_state',
            'property'  => 'status'
        ],
        'supports' => [Crime::class],
        'places' => [
            Crime::STATUS_PENDING,
            Crime::STATUS_AWAITING_INVESTIGATION,
            Crime::STATUS_AWAITING_PROSECUTION,
            Crime::STATUS_CONVICTED,
            Crime::STATUS_INNOCENT,
            Crime::STATUS_WITHDRAWN,
        ],
        'initial_places' => [Crime::STATUS_PENDING],
        'transitions' => [
            'to_investigation' => [
                'from'  => Crime::STATUS_PENDING,
                'to'    => Crime::STATUS_AWAITING_INVESTIGATION,
            ],
            'to_prosecution' => [
                'from'  => Crime::STATUS_AWAITING_INVESTIGATION,
                'to'    => Crime::STATUS_AWAITING_PROSECUTION,
            ],
            'to_convicted' => [
                'from'  => Crime::STATUS_AWAITING_PROSECUTION,
                'to'    => Crime::STATUS_CONVICTED,
            ],
            'to_innocent' => [
                'from'  => Crime::STATUS_AWAITING_PROSECUTION,
                'to'    => Crime::STATUS_INNOCENT,
            ],
            'to_withdrawn' => [
                'from'  => [Crime::STATUS_AWAITING_INVESTIGATION, Crime::STATUS_AWAITING_PROSECUTION],
                'to'    => Crime::STATUS_WITHDRAWN,
            ],
        ],
    ],
];
