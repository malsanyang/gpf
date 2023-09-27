<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $full_name
 * @property mixed $address
 * @property mixed $telephone_no
 * @property Carbon $dob
 */
class Criminal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'address',
        'telephone_no',
        'dob',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->first_name . ' ' . $this->last_name
        );
    }
}
