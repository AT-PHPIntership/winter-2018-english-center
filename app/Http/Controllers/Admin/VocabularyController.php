<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VocabularyService;
use App\Http\Requests\CreateVocabularyRequest;
use App\Models\Vocabulary;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabularies = app(VocabularyService::class)->index();
        return view('backend.vocabularies.index')->with('vocabularies', $vocabularies);
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vocabularies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request CreateVocabularyRequest request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVocabularyRequest $request)
    {
        $data = app(VocabularyService::class)->importFile($request);
        return $data ? redirect()->route('admin.vocabularies.index') : redirect()->back();
    }
}
