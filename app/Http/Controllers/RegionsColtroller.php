<?php

namespace App\Http\Controllers;

use App\Models\RecruitPost;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionsColtroller extends Controller
{
    public function getAllRegions()
    {
        return Region::orderBy('id', 'desc')->get();
    }

    public function createRegion(Request $request, Region $region)
    {
        return $region->create($request->validate([
            'region' => 'required',
            'region_slug' => 'required|unique:regions,region_slug'
        ]));
    }
}
