<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VocabularyService;
use App\Http\Requests\CreateImportFileRequest;
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
     * @param \Illuminate\Http\Request $request CreateImportFileRequest request
     *
     * @return \Illuminate\Http\Response
     */
    public function importFile(CreateImportFileRequest $request)
    {
        $data = app(VocabularyService::class)->importFile($request);
        if ($data) {
            return redirect()->route('admin.vocabularies.index');
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $requestVoca CreateVocabularyRequest request vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVocabularyRequest $requestVoca)
    {
        app(VocabularyService::class)->store($requestVoca);
        return redirect()->route('admin.vocabularies.index')->with('success', __('common.success'));
    }

    /**
      * Edit the form for editing the specified resource.
      *
      * @param Vocabulary $id vocabulary
      *
      * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vocabulary = app(VocabularyService::class)->edit($id);
        return view('backend.vocabularies.edit')->with('vocabulary', $vocabulary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\CreateVocabularyRequest $request    request
     * @param Vocabulary                               $vocabulary vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVocabularyRequest $request, Vocabulary $vocabulary)
    {
        app(VocabularyService::class)->update($request->all(), $vocabulary);
        return redirect()->route('admin.vocabularies.index')->with('success', __('common.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vocabulary $vocabulary vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vocabulary $vocabulary)
    {
        app(VocabularyService::class)->destroy($vocabulary);
        return redirect()->route('admin.vocabularies.index')->with('success', __('common.success'));
    }
}
