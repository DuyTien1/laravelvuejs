<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Http\Resources\StoryResource;
use App\Http\Resources\StoryCollection;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StoryCollection(Story::paginate(2));
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
                'storyname' => 'required',
                'storyname' => 'required',
                'describe' => 'required',
                'source' => 'required'
            ],
            [
                'storyname.required' => 'Tên truyện không được bỏ trống.',
                'storyname.required' => 'Tên tác giả không được bỏ trống.',
                'describe.required' => 'mô tả không được bỏ trống.',
                'source.required' => 'Nguồn truyện không được bỏ trống.'
            ]
        );
        $story = Story::create($request->all());
        return new StoryResource($story);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return new StoryResource($story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $story->update($request->all());
        return new StoryResource($story);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        Story::destroy($story);
    }
}