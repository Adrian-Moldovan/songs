<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;
use App\Http\Requests\GenreStoreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Genre::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\GenreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreStoreRequest $request)
    {
        $validated = $request->validated();
        return Genre::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return $genre;
    }


    /**
    * @param  \App\Models\Genre  $genre
    * @return \Illuminate\Http\Response
    */
    public function showGenreSongs(Genre $genre, int $genreId){
        return $genre->with('songs')->find($genreId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GenreStoreRequest $request
     * @param  \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreStoreRequest $request, Genre $genre)
    {
        $validated = $request->validated();
        $genre->update($validated);
        return $genre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        return $genre->delete(); 
    }
}
