<?php

namespace App\Models;

use App\Services\ProjectFinancialsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $casts = [
    //     'segments' => 'array',
    // ];

    public function segments(): HasMany
    {
        return $this->hasMany(Segment::class);
    }

    // public function costs(): float
    // {

    // }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function (Project $project) {
            return (new ProjectFinancialsService)->calculateTotals($project);
        });
    }
}
