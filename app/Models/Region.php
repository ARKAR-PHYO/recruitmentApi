<?php

namespace App\Models;

use App\Models\RecruitPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
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
     * Get the recruitPost that owns the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recruitPost(): BelongsTo
    {
        return $this->belongsTo(RecruitPost::class);
    }
}
