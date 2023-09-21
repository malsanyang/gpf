<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $case_number
 * @property mixed $description
 * @property mixed $status
 * @property int $reported_by
 * @property int $criminal_id
 * @property int $police_officer_id
 * @property mixed $investigation_report
 * @property mixed $prosecution_report
 * @property int $investigator_id
 * @property int $police_id
 * @property int $prosecutor_id
 * @property int $police_station_id
 * @property int $prison_id
 * @property int $court_id
 */
class Crime extends Model
{
    use HasFactory;
}
