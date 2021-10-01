<?php

namespace App\Http\Controllers;

use App\Models\RecruitCategory;
use Illuminate\Http\Request;

class RecruitCategoriesController extends Controller
{
    public function getAllCategories()
    {
        return RecruitCategory::orderBy('id', 'desc')->get();
    }

    public function createRecruitCategory(Request $request, RecruitCategory $recruitCategory)
    {
        return $recruitCategory->create($request->validate([
            'category_name' => 'required',
            'category_slug' => 'bail|required|unique:recruit_categories,category_slug',
        ]));
    }


}
