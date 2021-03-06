<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VocabularyService;
use App\Http\Requests\ImportVocabularyRequest;
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
     * @param \Illuminate\Http\Request $request ImportVocabularyRequest request
     *
     * @return \Illuminate\Http\Response
     */
    public function importFile(ImportVocabularyRequest $request)
    {
        try {
            app(VocabularyService::class)->importFile($request);
            return redirect()->route('admin.vocabularies.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request CreateVocabularyRequest request vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVocabularyRequest $request)
    {
        app(VocabularyService::class)->store($request->all());
        return redirect()->route('admin.vocabularies.index')->with('success', __('common.success'));
    }

    /**
      * Edit the form for editing the specified resource.
      *
      * @param Vocabulary $vocabulary vocabulary
      *
      * @return \Illuminate\Http\Response
     */
    public function edit(Vocabulary $vocabulary)
    {
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

    /**
     * Display the specified resource.
     *
     * @param Vocabulary $vocabulary Vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Vocabulary $vocabulary)
    {
        return view('backend.vocabularies.show', compact('vocabulary'));
    }

    /**
     * Get List Vocabularies
     *
     * @param Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function getListVocabularies(Request $request)
    {
        if ($request->ajax()) {
            $vocalbularies = Vocabulary::select(['id', 'vocabulary as text'])->where('vocabulary', 'LIKE', '%' . $request["term"] . '%')->paginate(config('define.page_site_vocabulary'));
            $results = [
                "results" => $vocalbularies->items(),
                "pagination" => [
                    "more" => $vocalbularies->hasMorePages()
                ]
            ];
            return response()->json($results);
        }
    }
}
