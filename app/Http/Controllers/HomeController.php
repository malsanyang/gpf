<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * @return Response
    */
    public function index(): Response
    {
        $totalCase = Crime::all()->count();
        $underInvestigation = Crime::where('status', Crime::STATUS_AWAITING_INVESTIGATION)->count();
        $underProsecution = Crime::where('status', Crime::STATUS_AWAITING_INVESTIGATION)->count();
        $convicted = Crime::where('status', Crime::STATUS_CONVICTED)->count();
        $innocent = Crime::where('status', Crime::STATUS_INNOCENT)->count();
        $withdrawn = Crime::where('status', Crime::STATUS_WITHDRAWN)->count();

        return Inertia::render('Home/Index', [
            'cards' => [
                ['title' => 'Total Cases Reported', 'value' => $totalCase],
                ['title' => 'Awaiting Investigation', 'value' => $underInvestigation],
                ['title' => 'Cases Convicted', 'value' => $convicted],
                ['title' => 'Cases Innocent', 'value' => $innocent],
            ],
            'plots' => [
                ['label' => Crime::STATUS_AWAITING_INVESTIGATION, 'color' => '#10B981', 'value' => $underInvestigation, 'percentage' => $this->calPercentage($underInvestigation, $totalCase)],
                ['label' => Crime::STATUS_AWAITING_PROSECUTION, 'color' => '#375E83', 'value' => $underProsecution, 'percentage' => $this->calPercentage($underProsecution, $totalCase)],
                ['label' => Crime::STATUS_CONVICTED, 'color' => '#259AE6', 'value' => $convicted, 'percentage' => $this->calPercentage($convicted, $totalCase)],
                ['label' => Crime::STATUS_INNOCENT, 'color' => '#FFA70B', 'value' => $innocent, 'percentage' => $this->calPercentage($innocent, $totalCase)],
                ['label' => Crime::STATUS_WITHDRAWN, 'color' => '#72195A', 'value' => $withdrawn, 'percentage' => $this->calPercentage($withdrawn, $totalCase)],
            ],
        ]);
    }

    /**
     * @param int $val
     * @param int $total
     *
     * @return string
    */
    private function calPercentage(int $val, int $total): string
    {
        return number_format(($val/$total) * 100.0, 2);
    }
}
