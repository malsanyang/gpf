<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $prison_no
 * @property mixed $name
 * @property mixed $location
 */
class Prison extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];
}
