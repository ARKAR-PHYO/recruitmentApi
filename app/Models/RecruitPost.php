<?php

namespace App\Models;

use App\Models\Region;
use App\Models\RecruitCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitPost extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['CreatedDate', 'UpdatedDate'];

    public function getCreatedDateAttribute()
    {
        return $this->created_at->toDateTimeString();
    }

    public function getUpdatedDateAttribute()
    {
        return $this->updated_at->toDateTimeString();
    }

    /**
     * Get all of the recruitCategories for the RecruitPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recruitCategories(): HasMany
    {
        return $this->hasMany(RecruitCategory::class);
    }

    /**
     * Get all of the recruitRegions for the RecruitPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recruitRegions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
