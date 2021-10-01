<?php

namespace App\Http\Controllers;

use App\Models\RecruitPost;
use Illuminate\Http\Request;

class recruitPostsController extends Controller
{
    public function createRecruitPost(Request $request, RecruitPost $recruitPost)
    {
        return $recruitPost->create($request->validate([
            'position' => 'required',
            'position_slug' => 'required',
            'vacant' => 'required',
            'gender' => 'required',
            'job_code' => 'required',
            'job_descriptions' => 'required',
            'job_requirements' => 'required',
            'category_id' => 'required',
            'region_id' => 'required,'
        ]));
    }

    // public function storeRecruitPost()
    // {
    //     # code...
    // }
}
