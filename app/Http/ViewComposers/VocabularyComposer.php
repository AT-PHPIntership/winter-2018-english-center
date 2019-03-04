<?php

namespace App\Http\ViewComposers;

use App\Services\VocabularyService;
use Illuminate\View\View;

class VocabularyComposer
{
    /**
     * Where to receipt roles from VocabularyService.
     *
     * @var $vocabulariesService
     */
    protected $vocabulariesService;

    /**
     * Create a new controller instance.
     *
     * @param VocabularyService $vocabularies VocabularyService
     *
     * @return void
     */
    public function __construct(VocabularyService $vocabularies)
    {
        $this->vocabulariesService = $vocabularies;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view View
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('vocabularies', $this->vocabulariesService->index());
    }
}
