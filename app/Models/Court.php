<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $court_no
 * @property mixed $name
 * @property mixed $location
 */
class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];
}
