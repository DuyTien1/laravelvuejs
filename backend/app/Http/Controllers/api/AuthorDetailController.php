<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorDetail;
use App\Http\Resources\AuthorDetailResource;
use App\Http\Resources\AuthorDetailCollection;

class AuthorDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AuthorDetailCollection(AuthorDetail::paginate(5));
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
    {
        $request->validate(
            [
                'author_id' => 'required',
                'user_id' => 'required'
            ],
            [
                'author_id.required' => 'Tên danh mục không được bỏ trống.',
                'user_id.required' => 'Mô tả không được bỏ trống.'
            ]
        );
        $authorDetail = AuthorDetail::create($request->all());
        return new AuthorDetailResource($authorDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthorDetail  $authorDetail
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorDetail $authorDetail)
    {
        return new AuthorDetailResource($authorDetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthorDetail  $authorDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorDetail $authorDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthorDetail  $authorDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorDetail $authorDetail)
    {
        $authorDetail->update($request->all());
        return new AuthorDetailResource($authorDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthorDetail  $authorDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorDetail $authorDetail)
    {
        AuthorDetail::destroy($authorDetail);
    }
}
