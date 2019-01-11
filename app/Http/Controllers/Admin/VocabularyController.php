<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VocabularyService;

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
}
