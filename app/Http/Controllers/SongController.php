<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SongStoreRequest;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Song::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SongStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongStoreRequest $request)
    {
        $validated = $request->validated();
        return Song::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  $song \App\Models\Song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return $song
                ->with('genre')
                ->with('artists')
                ->find($song->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song
     * @return \Illuminate\Http\Response
     */
    public function update(SongStoreRequest $request, Song $song)
    {
        $validated = $request->validated();
        $song->update($validated);
        return $song;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
    }
}
