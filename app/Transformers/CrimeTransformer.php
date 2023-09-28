<?php

namespace App\Transformers;

use App\Models\Crime;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\NullResource;
use League\Fractal\TransformerAbstract;

class CrimeTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        'citizen', 'court', 'criminal', 'investigator', 'policeOfficer', 'policeStation',
        'prosecutor', 'prison'
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        'citizen', 'court', 'criminal', 'investigator', 'policeOfficer', 'policeStation',
        'prosecutor', 'prison'
    ];

    /**
     * A Fractal transformer.
     * @param Crime $crime
     *
     * @return array
     */
    public function transform(Crime $crime): array
    {
        return [
            'id' => $crime->id,
            'caseNumber' => $crime->case_number,
            'crimeType' => $crime->crime_type,
            'location' => $crime->location,
            'description' => $crime->description,
            'status' => $crime->status,
            'witnessedBy' => $crime->witnessed_by,
            'investigationReport' => $crime->investigation_report,
            'prosecutionReport' => $crime->prosecution_report,
        ];
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includeCitizen(Crime $crime): Item|NullResource
    {
        if (empty($crime->citizen))
        {
            return $this->null();
        }

        return $this->item($crime->citizen, new CitizenTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includeCourt(Crime $crime): Item|NullResource
    {
        if (empty($crime->court))
        {
            return $this->null();
        }

        return $this->item($crime->court, new CourtTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includeCriminal(Crime $crime): Item|NullResource
    {
        if (empty($crime->criminal))
        {
            return $this->null();
        }

        return $this->item($crime->criminal, new CriminalTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includeInvestigator(Crime $crime): Item|NullResource
    {
        if (empty($crime->investigator))
        {
            return $this->null();
        }

        return $this->item($crime->investigator, new UserTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includePoliceOfficer(Crime $crime): Item|NullResource
    {
        if (empty($crime->policeOfficer))
        {
            return $this->null();
        }

        return $this->item($crime->policeOfficer, new UserTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includePoliceStation(Crime $crime): Item|NullResource
    {
        if (empty($crime->policeStation))
        {
            return $this->null();
        }

        return $this->item($crime->policeStation, new PoliceStationTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includeProsecutor(Crime $crime): Item|NullResource
    {
        if (empty($crime->prosecutor))
        {
            return $this->null();
        }

        return $this->item($crime->prosecutor, new UserTransformer());
    }

    /**
     * @param Crime $crime
     *
     * @return Item|NullResource
     */
    public function includePrison(Crime $crime): Item|NullResource
    {
        if (empty($crime->prison))
        {
            return $this->null();
        }

        return $this->item($crime->prison, new PrisonTransformer());
    }
}
