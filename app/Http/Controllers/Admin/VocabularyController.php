<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VocabularyService;
use App\Http\Requests\CreateVocabularyRequest;
use Excel;
use App\Models\Vocabulary;
use App\Http\Controllers\Admin\Item;

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
        app(VocabularyService::class)->import($request);
        return redirect()->route('admin.vocabularies.index')->with('success', 'Insert Record successfully.');
    }
}
