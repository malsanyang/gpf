<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

/**
 * @property mixed $id
 * @property mixed $case_number
 * @property mixed $crime_type
 * @property mixed $location
 * @property mixed $description
 * @property mixed $status
 * @property int $reported_by
 * @property mixed $witnessed_by
 * @property int $criminal_id
 * @property int $police_officer_id
 * @property mixed $investigation_report
 * @property mixed $prosecution_report
 * @property int $investigator_id
 * @property int $prosecutor_id
 * @property int $police_station_id
 * @property int $prison_id
 * @property int $court_id
 * @property Citizen $citizen
 * @property Court $court
 * @property Criminal $criminal
 * @property User $investigator
 * @property User $policeOfficer
 * @property PoliceStation $policeStation
 * @property User $prosecutor
 * @property Prison $prison
 */

class Crime extends Model
{
    use HasFactory, WorkflowTrait;

    const STATUS_PENDING = 'Pending';
    const STATUS_AWAITING_INVESTIGATION = 'Awaiting Investigation';
    const STATUS_AWAITING_PROSECUTION = 'Awaiting Prosecution';
    const STATUS_CONVICTED = 'Convicted';
    const STATUS_INNOCENT = 'Innocent';
    const STATUS_WITHDRAWN = 'Case Withdrawn';

    protected $fillable = [
        'crime_type',
        'location',
        'description',
        'reported_by',
        'witnessed_by',
        'criminal_id',
        'investigation_report',
        'prosecution_report',
        'investigator_id',
        'prosecutor_id',
        'prison_id',
        'court_id',
    ];

    /**
     * @return BelongsTo
    */
    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class, 'reported_by');
    }

    /**
     * @return BelongsTo
     */
    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'court_id');
    }

    /**
     * @return BelongsTo
     */
    public function criminal(): BelongsTo
    {
        return $this->belongsTo(Criminal::class, 'criminal_id');
    }

    /**
     * @return BelongsTo
     */
    public function investigator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investigator_id');
    }

    /**
     * @return BelongsTo
     */
    public function policeOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'police_officer_id');
    }

    /**
     * @return BelongsTo
     */
    public function policeStation(): BelongsTo
    {
        return $this->belongsTo(PoliceStation::class, 'police_station_id');
    }

    /**
     * @return BelongsTo
     */
    public function prosecutor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'prosecutor_id');
    }

    /**
     * @return BelongsTo
     */
    public function prison(): BelongsTo
    {
        return $this->belongsTo(Prison::class, 'prison_id');
    }

    /**
     * @return string
    */
    public function getDefaultWorkflow(): string
    {
        return 'crime_workflow';
    }
}
