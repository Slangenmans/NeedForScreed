<?php

namespace App\Services;

use App\Models\Project;

class ProjectFinancialsService
{

    public function calculateTotals(Project $project): bool
    {
        $segments = $project->segments;
        // TODO: Calculate actual totals
        dd('you are here');
        $revenue = 100;
        $costs = 100;

        $project->fill([
            'revenue' => $revenue,
            'costs' => $costs,
        ]);

        return true;
    }
}
