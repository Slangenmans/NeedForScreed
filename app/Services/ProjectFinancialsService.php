<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Segment;
use Illuminate\Support\Collection;

class ProjectFinancialsService
{

    public function calculateTotals(Project $project): bool
    {
        /** @var Collection<Segment> */
        $segments = $project->segments;

        $revenue = 0;
        $costs = 0;

        foreach ($segments as $segment) {
            if ($segment->isFloor) {
                if ($segment->isDoneFloor) {
                    $revenue += $segment->price_per_segment;
                }
            }
        }

        $project->fill([
            'revenue' => $revenue,
            'costs' => $costs,
        ]);

        // dd(
        //     $segments,
        //     $segments[0]->isFloor,
        //     // $segments[0]->isIsolation,
        //     $segments[0]->isDoneFloor,
        //     $segments[0]->price_per_segment,
        //     $revenue,
        // );

        return true;
    }
}
