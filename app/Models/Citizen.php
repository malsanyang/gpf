<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $nin_number
 * @property mixed $phone_number
*/
class Citizen extends Model
{
    use HasFactory;
}
