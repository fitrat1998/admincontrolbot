<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguagesRequest;
use App\Http\Requests\UpdateLanguagesRequest;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $languages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguagesRequest $request, Language $languages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $languages)
    {
        //
    }
}
