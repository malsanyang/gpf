<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $location
 * @property mixed $telephone_no
 */
class PoliceStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];
}
