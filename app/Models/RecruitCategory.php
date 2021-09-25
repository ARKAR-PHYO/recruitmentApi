<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitCategory extends Model
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
}
