<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->get();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // Barcha kinolarni bazadan olish
        $movies = Movie::all();


        $messages = json_decode(session('telegram_message', '[]')); // Agar mavjud bo'lmasa, bo'sh massiv


//        dd($messages);


        return view('admin.movies.add', compact('movies', 'messages'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required',
            'file_name' => 'required',
            'file_id' => 'required',
            'file_size' => 'required',
            'mime_type' => 'required',
            'language_code' => 'required',
        ]);

        $exists = Movie::where('file_id', $request->file_id)->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Bu fayl allaqachon mavjud!');
        }

        $movie = Movie::create([
            'code' => $request->code,
            'file_name' => $request->file_name,
            'file_id' => $request->file_id,
            'file_size' => $request->file_size,
            'mime_type' => $request->mime_type,
            'language_code' => $request->lang,
        ]);


        return redirect()->route('movies.index')->with('success', 'Филм бомуваффақият илова карда шуд');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        // Barcha kinolarni bazadan olish
        $movies = Movie::all();

        return view('admin.movies.edit', compact('movie','movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

//        dd($request);

        $request->validate([
            'code' => 'required',
            'file_name' => 'required',
            'file_id' => 'required',
            'file_size' => 'required',
            'mime_type' => 'required',
            'language_code' => 'required',
        ]);


        $movie = Movie::findOrFail($id);


        $movie->update([
            'code' => $request->code,
            'file_name' => $request->file_name,
            'file_id' => $request->file_id,
            'file_size' => $request->file_size,
            'mime_type' => $request->mime_type,
            'language_code' => $request->language_code,
        ]);

        return redirect()->route('movies.index')->with('success', 'Филм бомуваффақият навсозӣ шуд!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Филм бомуваффақият нест шуд!!');
    }
}
