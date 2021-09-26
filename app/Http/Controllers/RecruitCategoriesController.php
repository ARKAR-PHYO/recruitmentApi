<?php

namespace App\Http\Controllers;

use App\Models\RecruitCategory;
use Illuminate\Http\Request;

class RecruitCategoriesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return RecruitCategory::orderBy('id', 'desc')->get();
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, RecruitCategory $recruitCategory)
    {
        return $recruitCategory->create($request->validate([
            'category_name' => 'required',
            'category_slug' => 'bail|required|unique:recruit_categories,category_slug',
        ]));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($category_slug, RecruitCategory $recruitCategory)
    {
        return $recruitCategory->where('category_slug', $category_slug)->firstOrFail();
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $category_slug, RecruitCategory $recruitCategory)
    {
        return $recruitCategory->where('category_slug', $category_slug)->update($request->validate([
            'category_name' => 'required',
            'category_slug' => "bail|required|unique:recruit_categories,category_slug,$request->id"
        ]));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($category_slug, RecruitCategory $recruitCategory)
    {
        return $recruitCategory->where('category_slug', $category_slug)->delete();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  str  $category_name
    * @return \Illuminate\Http\Response
    */
    public function search($category_name)
    {
        return RecruitCategory::where('category_name', 'like', '%'.$category_name.'%')->get();
    }
}
