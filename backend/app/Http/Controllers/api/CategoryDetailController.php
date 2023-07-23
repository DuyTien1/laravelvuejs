<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Resources\CategoryDetailResource;
use App\Http\Resources\CategoryDetailCollection;

class CategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryDetailCollection(CategoryDetail::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        $categoryDetail = CategoryDetail::create($request->all());
        return new CategoryDetailResource($categoryDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDetail $categoryDetail)
    {
        return new CategoryDetailResource($categoryDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDetail $categoryDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryDetail $categoryDetail)
    {
        $categoryDetail->update($request->all());
        return new CategoryDetailResource($categoryDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDetail  $categoryDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDetail $categoryDetail)
    {
        CategoryDetail::destroy($categoryDetail->id);
    }
}
